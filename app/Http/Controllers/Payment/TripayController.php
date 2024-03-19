<?php

namespace App\Http\Controllers\Payment;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripayCheckoutRequest;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    private PaymentInterface $payment;
    private ProductInterface $product;

    public function __construct(PaymentInterface $payment, ProductInterface $productData)
    {
        $this->payment = $payment;
        $this->product = $productData;
    }

    public function store(TripayCheckoutRequest $request)
    {
        $productDetail = $this->product->getId($request->product_id);
        $method = $request->payment_code;
        $totalAmount = (int) $request->amount;

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
