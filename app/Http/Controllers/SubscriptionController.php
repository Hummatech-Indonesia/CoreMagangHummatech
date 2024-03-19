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

    /**
     * Displaying the product listing
     *
     * @package pkl-hummatech
     * @author cakadi190
     */
    public function index()
    {
        $division = auth()->user()->student->division_id;
        $products = $this->productInterface->getProductsBasedOnDivision($division);
        return view('student_online.langganan.index', compact('products'));
    }

    public function checkout()
    {}
}
