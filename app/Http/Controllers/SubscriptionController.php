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
        $id = $request->id;
        $this->checkout->add($id);
        return redirect()->route('subscription.checkout')->with('success', 'Produk udah di tambahkan ke dalam keranjang');
    }

    public function subscribeDeleteCartProcess(CartProductDeleteRequest $request)
    {
        $id = $request->id;
        $this->checkout->remove($id);
        (new VoucherSubmitController)->reset();
        return redirect()->back()->with('success', 'Produk di hapus dari keranjang.');
    }

    /**
     * Displaying the product checkout
     *
     * @package pkl-hummatech
     * @author cakadi190
     */
    public function checkout()
    {
        $cart = session()->get('cart-product');
        $voucher = session()->get('voucher');

        $voucherDetail = $voucher ? $this->voucherInterface->getVoucherByCode($voucher[0]) : null;
        $productDetail = $cart ? $this->productInterface->getId($cart[0]) : null;
        $paymentChannel = $this->paymentInterface->getPaymentChannel();

        return view('student_online.langganan.checkout', compact('productDetail', 'paymentChannel', 'voucherDetail'));
    }
}
