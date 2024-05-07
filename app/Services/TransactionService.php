<?php

namespace App\Services;

use App\Contracts\Interfaces\TransactionInterface;
use App\Helpers\CurrencyHelper;
use App\Http\Requests\TransactionRequest;
use App\Models\Course;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Request;

class TransactionService {

    private TripayService $service;
    private TransactionInterface $transaction;
    public function __construct(TripayService $tripayService, TransactionInterface $transactionInterface)
    {
        $this->transaction = $transactionInterface;
        $this->service = $tripayService;
    }

    /**
     * handleCheckout
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return mixed
     */
    public function handleCheckout(TransactionRequest $request, Product $product): mixed
    {
        $data = $request->validated();
        $getYear = substr(now()->format('Y'), -2);

        $price = $product->price;
        $amount = CurrencyHelper::countPriceAfterTax($price, 11);

        $external_id = "KLHM" . $getYear . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $signature = $this->service->handleGenerateSignature($external_id, $amount);

        $pay = [
            'method' => $data['payment_code'],
            'merchant_ref' => $external_id,
            'amount' => $amount,
            'customer_name' => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->student->phone,
            'order_items' => [
                [
                    'name' => $product->name,
                    'price' => $amount,
                    'quantity' => 1,
                    'product_url' => config('app.url') . "/products/" . $product->id,
                    'image_url' => asset('storage/' . $product->image),
                ]
            ],
            'return_url' => config('app.url') . "checkout/" . $external_id . "/success",
            'expired_time' => (time() + (30 * 60)),
            'signature' => $signature,
        ];

        $createInvoice = $this->service->handleCreateTransaction($pay);

        $transaction = $this->transaction->store([
            'reference' => $createInvoice['data']['reference'],
            'merchant_ref' => $createInvoice['data']['merchant_ref'],
            'payment_method' => $createInvoice['data']['payment_method'],
            'payment_name' => $createInvoice['data']['payment_name'],
            'user_id' => auth()->user()->id,
            'callback_url' => $createInvoice['data']['callback_url'],
            'return_url' => $createInvoice['data']['return_url'],
            'pay_code' => $createInvoice['data']['pay_code'],
            'pay_url' => $createInvoice['data']['pay_url'],
            'product_id' => $product->id,
            'amount' => $createInvoice['data']['amount'],
            'total_fee' => $createInvoice['data']['total_fee'],
            'status' => $createInvoice['data']['status'],
            'expired_time' => Carbon::createFromTimestamp($createInvoice['data']['expired_time'])->format('Y-m-d H:i:s'),

        ]);

        return $transaction;
    }

    /**
     * handleCheckoutCourse
     *
     * @param  mixed $request
     * @param  mixed $course
     * @return mixed
     */
    public function handleCheckoutCourse(TransactionRequest $request, Course $course): mixed
    {
        $data = $request->validated();
        $getYear = substr(now()->format('Y'), -2);

        $price = $course->price;
        $amount = CurrencyHelper::countPriceAfterTax($price, 11);

        $external_id = "KLHM" . $getYear . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $signature = $this->service->handleGenerateSignature($external_id, $amount);

        $pay = [
            'method' => $data['payment_code'],
            'merchant_ref' => $external_id,
            'amount' => $amount,
            'customer_name' => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->student->phone,
            'order_items' => [
                [
                    'name' => $course->title,
                    'price' => $amount,
                    'quantity' => 1,
                    'product_url' => config('app.url') . "/products/" . $course->id,
                    'image_url' => asset('storage/' . $course->image),
                ]
            ],
            'return_url' => config('app.url') . "checkout/" . $external_id . "/success",
            'expired_time' => (time() + (30 * 60)),
            'signature' => $signature,
        ];

        $createInvoice = $this->service->handleCreateTransaction($pay);

        $transaction = $this->transaction->store([
            'reference' => $createInvoice['data']['reference'],
            'merchant_ref' => $createInvoice['data']['merchant_ref'],
            'payment_method' => $createInvoice['data']['payment_method'],
            'payment_name' => $createInvoice['data']['payment_name'],
            'user_id' => auth()->user()->id,
            'callback_url' => $createInvoice['data']['callback_url'],
            'return_url' => $createInvoice['data']['return_url'],
            'pay_code' => $createInvoice['data']['pay_code'],
            'pay_url' => $createInvoice['data']['pay_url'],
            'course_id' => $course->id,
            'amount' => $createInvoice['data']['amount'],
            'total_fee' => $createInvoice['data']['total_fee'],
            'status' => $createInvoice['data']['status'],
            'expired_time' => Carbon::createFromTimestamp($createInvoice['data']['expired_time'])->format('Y-m-d H:i:s'),

        ]);

        return $transaction;
    }

    public function handleCallback(HttpRequest $request): mixed
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, config('tripay.private_key'));

        if ($signature !== (string) $callbackSignature) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
                'code' => 400,
            ], 400);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return response()->json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
                'code' => 400,
            ], 400);
        }

        $data = json_decode($json);
        return $data;
    }
}
