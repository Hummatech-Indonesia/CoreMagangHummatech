<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\PaymentInterface;
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
    private TransactionHistoryInterface $transactionHistory;
    private PaymentInterface $paymentInterface;
    private Cart $cart;
    private VoucherInterface $voucherInterface;
    private OrderInterface $orderInterface;

    public function __construct(
        PaymentInterface $payment,
        Cart $cart,
        VoucherInterface $voucherInterface,
        PaymentInterface $paymentInterface,
        TransactionHistoryInterface $transactionHistory,
        OrderInterface $orderInterface
    )
    {
        $this->payment = $payment;
        $this->orderInterface = $orderInterface;
        $this->cart = $cart;
        $this->voucherInterface = $voucherInterface;
        $this->paymentInterface = $paymentInterface;
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
        $productDetail = $this->cart->get();
        $method = $request->input('payment_code');
        $totalAmount = (int) $request->input('total');

        try {
            $response = $this->payment->transaction($method, $totalAmount, $productDetail->map(function ($item) {
                return [
                    'name'        => $item['name'],
                    'price'       => (int) $item['price'],
                    'quantity'    => 1,
                    'product_url' => route('subscription.index'),
                ];
            })->push(...[
                [
                    'name' => 'Voucher',
                    'price' => - ((int) $request->input('discount')) ?? 0,
                    'quantity' => 1,
                ],
                [
                    'name' => 'PPn 11%',
                    'price' => (int) $request->input('tax') ?? 0,
                    'quantity' => 1,
                ]
            ])->toArray());

            $dueDate = Carbon::createFromTimestamp($response['data']['expired_time'])->setTimezone('Asia/Jakarta');

            $transactionHistory = $this->transactionHistory->store([
                'transaction_id' => $response['data']['merchant_ref'],
                'reference' => $response['data']['reference'],
                'user_id' => auth()->user()->id,
                'amount' => $totalAmount + $response['data']['total_fee'],
                'checkout_url' => $response['data']['checkout_url'],
                'issued_at' => now(),
                'expired_at' => $dueDate->format('Y-m-d H:i:s'),
                'status' => TransactionStatusEnum::PENDING->value,
            ]);

            $productDetail->map(function($item) use ($transactionHistory) {
                $this->orderInterface->store([
                    'user_id' => auth()->id(),
                    'transaction_histories_id' => $transactionHistory->id,
                    'courses_id' => (int) $item['option']['id'],
                    'name' => $item['name'],
                    'price' => (int) $item['price'],
                    'amount' => (int) $item['amount'],
                    'image' => $item['image'],
                ]);
            });

            Cart::truncate();
            session()->forget('voucher');

            return redirect()->route('transaction-history.detail', $transactionHistory->transaction_id)
                ->with('success', 'Metode pembayaran, berhasil diminta.');
        } catch (\Exception $e) {
            return back()->with('error', "Sebuah kesalahan telah terjadi. Silahkan coba kembali. {$e->getMessage()}");
        }
    }

    // public function myOrder(Request $request)
    // {
    //     $transactions = Auth::user()->transaction()
    //         ->when($request->has('status'), function ($query) use ($request) {
    //             return $query->where('status', $request->get('status'));
    //         });

    //     if (!$request->has('sort') || $request->get('sort') == 'latest') {
    //         $transactions = $transactions->latest();
    //     } else {
    //         $transactions = $transactions->oldest();
    //     }

    //     $transactions = $transactions->paginate(12);
    //     return view('student_online_&_offline.transaction.my-order', compact('transactions'));
    // }

    public function detail(TransactionHistory $reference)
    {
        $paymentDetail = $this->payment->getPaymentDetail($reference->reference);
        return view('student_online_&_offline.transaction.detail', compact('reference', 'paymentDetail'));
    }

    public function callback(Request $request)
    {
        return $this->payment->callback($request);
    }
}
