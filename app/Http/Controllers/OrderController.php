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

    public function index()
    {
        $orders = $this->orderInterface->paginate();

        return view('student_online_&_offline.transaction.my-order', compact('orders'));
    }
}
