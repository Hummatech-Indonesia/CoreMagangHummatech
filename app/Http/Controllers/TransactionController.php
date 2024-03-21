<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Enum\TransactionStatusEnum;
use App\Http\Requests\TripayCheckoutRequest;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private PaymentInterface $payment;
    private ProductInterface $product;
    private TransactionHistoryInterface $transactionHistory;

    public function __construct(PaymentInterface $payment, ProductInterface $productData, TransactionHistoryInterface $transactionHistory)
    {
        $this->payment = $payment;
        $this->product = $productData;
        $this->transactionHistory = $transactionHistory;
    }

    public function index()
    {
        $transactions = auth()->user()->transaction()->latest()->paginate();
        return view('student_online_&_offline.transaction.index', compact('transactions'));
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
            return back()->with('error', $e->getMessage());
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
