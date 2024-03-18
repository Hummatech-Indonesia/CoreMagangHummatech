<?php

namespace App\Http\Controllers\Payment;

use App\Contracts\Interfaces\PaymentInterface;
use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    private PaymentInterface $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }

    public function index()
    {
        $channels = $this->payment->getPaymentChannel();
        return view('admin.tripay.index', compact('channels'));
    }

    public function store(Request $request)
    {
        $method = $request->method;
        $totalAmount = 250000;

        $response = $this->payment->transaction($method, $totalAmount, [
            [
                'name'        => 'Nama Produk 1',
                'price'       => 150000,
                'quantity'    => 1,
                'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
            ],
            [
                'name'        => 'Nama Produk 2',
                'price'       => 100000,
                'quantity'    => 1,
                'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
            ],
        ]);

        return response()->json($response);
    }

    public function callback(Request $request)
    {
        return $this->payment->callback($request);
    }
}
