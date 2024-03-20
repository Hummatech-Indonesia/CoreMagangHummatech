<?php

namespace App\Http\Controllers\Payment;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripayCheckoutRequest;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    private PaymentInterface $payment;
    private ProductInterface $product;
    private TransactionHistoryInterface $transactionHistory;

    public function __construct(PaymentInterface $payment, ProductInterface $productData, TransactionHistoryInterface $transactionHistory)
    {
        $this->payment = $payment;
        $this->product = $productData;
        $this->transactionHistory = $transactionHistory;
    }

    public function store(TripayCheckoutRequest $request)
    {
        $productDetail = $this->product->getId($request->product_id);
        $method = $request->payment_code;
        $totalAmount = (int) $request->amount;

        $transactionHistory = $this->transactionHistory->store([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'amount' => $totalAmount,
        ]);

        dd($transactionHistory);

        $response = $this->payment->transaction($method, $totalAmount, [
            [
                'name'        => $productDetail->name,
                'price'       => (int) $request->amount,
                'quantity'    => 1,
                'product_url' => route('subscription.index'),
            ],
        ]);

        # If has error from tripay
        if(!$response['success']) {
            return redirect()->back()->with('error', $response['message']);
        }

        dd($response);

        // return redirect($response['data']['checkout_url']);
    }

    public function callback(Request $request)
    {
        return $this->payment->callback($request);
    }
}
