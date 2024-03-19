<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProductInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index()
    {
        dd(auth()->user()->student);
        return view('student_online.langganan.index');
    }
}
