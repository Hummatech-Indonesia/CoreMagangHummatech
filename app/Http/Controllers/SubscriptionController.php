<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Http\Requests\CartProductAddRequest;
use App\Http\Requests\CartProductDeleteRequest;
use App\Services\CheckoutProductService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    private ProductInterface $productInterface;
    private PaymentInterface $paymentInterface;
    private CheckoutProductService $checkout;
    private VoucherInterface $voucherInterface;

    public function __construct(ProductInterface $productInterface, PaymentInterface $paymentInterface, CheckoutProductService $checkout, VoucherInterface $voucherInterface)
    {
        $this->middleware('roles:siswa-offline,siswa-online');
        $this->productInterface = $productInterface;
        $this->paymentInterface = $paymentInterface;
        $this->checkout = $checkout;
        $this->voucherInterface = $voucherInterface;
    }

    /**
     * Displaying the product listing before checkout
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

    public function subscribeAddCartProcess(CartProductAddRequest $request)
    {
        $this->checkout->add($request);

        return redirect()->route('transaction-history.checkout', $request->id)->with('success', 'Berhasil menambahkan data ke keranjang.');
    }
}
