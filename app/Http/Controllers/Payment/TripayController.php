<?php

namespace App\Http\Controllers\Payment;

use App\Contracts\Interfaces\Eloquent\TransactionInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{

    private PaymentInterface $payment;
    public function __construct(PaymentInterface $payment )
    {
        $this->payment = $payment;
    }

    public function index()
    {
        $chanels = $this->payment->payment();
        return view('admin.tripay.index', compact('chanels'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $method = $request->method;
        $this->payment->transaction($method);
    }
}
