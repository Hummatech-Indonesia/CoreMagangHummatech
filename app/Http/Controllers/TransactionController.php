<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Enum\TransactionStatusEnum;
use App\Http\Requests\TripayCheckoutRequest;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private PaymentInterface $payment;
    private ProductInterface $product;
    private TransactionHistoryInterface $transactionHistory;
    private PaymentInterface $paymentInterface;
    private Cart $cart;
    private VoucherInterface $voucherInterface;

    public function __construct(PaymentInterface $payment, Cart $cart, VoucherInterface $voucherInterface, ProductInterface $productData, PaymentInterface $paymentInterface, TransactionHistoryInterface $transactionHistory)
    {
        $this->payment = $payment;
        $this->cart = $cart;
        $this->voucherInterface = $voucherInterface;
        $this->paymentInterface = $paymentInterface;
        $this->product = $productData;
        $this->transactionHistory = $transactionHistory;
    }

    public function index()
    {
        $transactions = Auth::user()->transaction()
        ->when(request()->has('status'), function ($query) {
            return $query->where('status', request()->get('status'));
        })->latest()->paginate(10);
        return view('student_online_&_offline.transaction.index', compact('transactions'));
    }

    public function checkout()
    {
        $voucher = session()->get('voucher');

        $voucherDetail = $voucher ? $this->voucherInterface->getVoucherByCode($voucher[0]) : null;
        $paymentChannel = $this->paymentInterface->getPaymentChannel();
        $cartData = $this->cart;

        return view('student_online_&_offline.transaction.checkout', compact('paymentChannel', 'cartData', 'voucherDetail'));
    }

    public function store(TripayCheckoutRequest $request)
    {
        $productDetail = $this->product->getId($request->product_id);
        $method = $request->payment_code;
        $totalAmount = (int) $request->amount;

        try {
            $response = $this->payment->transaction($method, $totalAmount, [
                [
                    'name'        => $productDetail->name,
                    'price'       => (int) $request->amount,
                    'quantity'    => 1,
                    'product_url' => route('subscription.index'),
                ],
            ]);

            $dueDate = Carbon::createFromTimestamp($response['data']['expired_time'])->setTimezone('Asia/Jakarta');

            $transactionHistory = $this->transactionHistory->store([
                'transaction_id' => $response['data']['merchant_ref'],
                'reference' => $response['data']['reference'],
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'amount' => $totalAmount,
                'checkout_url' => $response['data']['checkout_url'],
                'issued_at' => now(),
                'expired_at' => $dueDate->format('Y-m-d H:i:s'),
                'status' => TransactionStatusEnum::PENDING->value,
            ]);

            return redirect()->route('transaction-history.detail', $transactionHistory->transaction_id)
                ->with('success', 'Metode pembayaran, berhasil diminta.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function myOrder(Request $request)
    {
        $transactions = Auth::user()->transaction()
        ->when($request->has('status'), function ($query) use ($request) {
            return $query->where('status', $request->get('status'));
        });

        if(!$request->has('sort') || $request->get('sort') == 'latest') {
            $transactions = $transactions->latest();
        } else {
            $transactions = $transactions->oldest();
        }

        $transactions = $transactions->paginate(12);
        return view('student_online_&_offline.transaction.my-order', compact('transactions'));
    }

    public function detail(TransactionHistory $reference)
    {
        $paymentDetail = $this->payment->getPaymentDetail($reference->reference);
        return view('student_online_&_offline.transaction.detail', compact('voucherDetail', 'paymentDetail'));
    }

    public function callback(Request $request)
    {
        return $this->payment->callback($request);
    }
}
