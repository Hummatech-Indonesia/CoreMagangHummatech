<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Contracts\Interfaces\VoucherUsageInterface;
use App\Enum\TransactionStatusEnum;
use App\Http\Requests\TripayCheckoutRequest;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Transaction;

class TransactionController extends Controller
{
    private PaymentInterface $payment;
    private TransactionHistoryInterface $transactionHistory;
    private PaymentInterface $paymentInterface;
    private Cart $cart;
    private VoucherInterface $voucherInterface;
    private OrderInterface $orderInterface;
    private VoucherUsageInterface $voucherUsageInterface;

    public function __construct(
        PaymentInterface $payment,
        Cart $cart,
        VoucherInterface $voucherInterface,
        PaymentInterface $paymentInterface,
        TransactionHistoryInterface $transactionHistory,
        OrderInterface $orderInterface,
        VoucherUsageInterface $voucherUsageInterface
    ) {
        $this->payment = $payment;
        $this->orderInterface = $orderInterface;
        $this->cart = $cart;
        $this->voucherInterface = $voucherInterface;
        $this->paymentInterface = $paymentInterface;
        $this->transactionHistory = $transactionHistory;
        $this->voucherUsageInterface = $voucherUsageInterface;
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

    public function store(Request $request)
    {
        $productDetail = $this->cart->get();
        $method = $request->input('payment_code');
        $totalAmount = (int) $request->input('total');

        try {
            $response = $this->payment->transaction(
                $method,
                $totalAmount,
                $productDetail->map(function ($item) use ($request) {
                    return [
                        'name'        => $item['name'],
                        'price'       => ceil(((int) $item['price']) - ((int) $request->input('discount'))),
                        'quantity'    => 1,
                        'product_url' => route('subscription.index'),
                    ];
                })
                ->push(...[
                    ...$productDetail->map(function ($item) use ($request) {
                        return [
                            'name'        => 'PPn 11%',
                            'price'       => (int) ceil(Transaction::countTax(((int) $item['price']) - ((int) $request->input('discount')))),
                            'quantity'    => 1,
                            'product_url' => route('subscription.index'),
                        ];
                    })
                ])
                ->toArray()
            );

            if (!$response['success']) {
                throw new \Exception("\"Gagal melakukan transaksi\", {$response['message']}");
            }

            # Convert timestamp to date
            $dueDate = Carbon::createFromTimestamp($response['data']['expired_time'])->setTimezone('Asia/Jakarta');

            # Store Transaction Data
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

            # Store Order Data
            $productDetail->map(function ($item) use ($transactionHistory) {
                $this->orderInterface->store([
                    'user_id' => auth()->id(),
                    'transaction_histories_id' => $transactionHistory->id,
                    'courses_id' => $item['option']['target_table'] !== 'subscribe' ? (int) $item['option']['id'] : null,
                    'products_id' => $item['option']['target_table'] === 'subscribe' ? (int) $item['option']['id'] : null,
                    'name' => $item['name'],
                    'price' => (int) $item['price'],
                    'amount' => (int) $item['amount'],
                    'image' => $item['image'],
                ]);
            });

            # Store Voucher
            $voucherData = $this->voucherInterface->getVoucherByCode(session('voucher')[0]);

            $this->voucherUsageInterface->store([
                'vouchers_id' => $voucherData->id,
                'students_id' => auth()->id(),
                'transaction_histories_id' => $transactionHistory->id,
                'used_at' => now(),
            ]);

            # Delete session
            Cart::truncate();
            session()->forget('voucher');

            # Redirect
            return redirect()->route('transaction-history.detail', $transactionHistory->transaction_id)
                ->with('success', 'Metode pembayaran, berhasil diminta.');
        } catch (\Exception $e) {
            return back()->with('error', "Sebuah kesalahan telah terjadi. Silahkan coba kembali. {$e->getMessage()}");
        }
    }

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
