<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderInterface $orderInterface;
    private TransactionInterface $transaction;

    public function __construct(OrderInterface $orderInterface, TransactionInterface $transactionInterface)
    {
        $this->transaction = $transactionInterface;
        $this->orderInterface = $orderInterface;
    }

    public function index(Request $request)
    {
        $transactions = $this->transaction->search($request);
        $orders = $this->orderInterface
        ->when($request->get('sort'), function($query) use($request) {
            if($request->sort == 'latest') {
                $query->latest();
            }
        })
        ->whereHas('transaction', function($query) use($request) {
            if($request->status) {
                $query->where('status', $request->status);
            }
        })
        ->where('user_id' , auth()->user()->id)->paginate();

        return view('student_online_&_offline.transaction.my-order', compact('transactions'));
    }
}
