<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OrderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderInterface $orderInterface;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    public function index(Request $request)
    {
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
        })->paginate();

        return view('student_online_&_offline.transaction.my-order', compact('orders'));
    }
}
