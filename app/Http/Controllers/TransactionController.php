<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ActiveCourseInterface;
use App\Contracts\Interfaces\ActiveFeatureInterface;
use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\TransactionInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Contracts\Interfaces\VoucherUsageInterface;
use App\Enum\TransactionStatusEnum;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests\TripayCheckoutRequest;
use App\Models\Course;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionHistory;
use App\Services\TransactionService;
use App\Services\TripayService;
use Carbon\Carbon;
use Cart;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class TransactionController extends Controller
{
    private PaymentInterface $payment;
    private TransactionHistoryInterface $transactionHistory;
    private PaymentInterface $paymentInterface;
    private Cart $cart;
    private ActiveFeatureInterface $activeFeature;
    private VoucherInterface $voucherInterface;
    private OrderInterface $orderInterface;
    private TripayService $tripayService;
    private TransactionService $service;
    private TransactionInterface $transaction;
    private VoucherUsageInterface $voucherUsageInterface;
    private ActiveCourseInterface $activeCourse;

    public function __construct(
        ActiveFeatureInterface $activeFeatureInterface,
        TransactionService $service,
        TransactionInterface $transactionInterface,
        PaymentInterface $payment,
        TripayService $tripayService,
        Cart $cart,
        VoucherInterface $voucherInterface,
        PaymentInterface $paymentInterface,
        TransactionHistoryInterface $transactionHistory,
        OrderInterface $orderInterface,
        VoucherUsageInterface $voucherUsageInterface,
        ActiveCourseInterface $activeCourseInterface,
    ) {
        $this->activeFeature = $activeFeatureInterface;
        $this->service = $service;
        $this->activeCourse = $activeCourseInterface;
        $this->transaction = $transactionInterface;
        $this->tripayService = $tripayService;
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

    /**
     * checkoutCourse
     *
     * @param  mixed $course
     * @return View
     */
    public function checkoutCourse(Course $course)
    {
        $cartData = $this->cart;
        $voucher = session()->get('voucher');
        $voucherDetail = $voucher ? $this->voucherInterface->getVoucherByCode($voucher[0]) : null;
        $paymentChannel = $this->tripayService->handlePaymentChannels();
        return view('student_online_&_offline.transaction.checkout-course', compact('course', 'cartData', 'voucherDetail', 'paymentChannel'));
    }

    public function checkout(Product $product)
    {
        $voucher = session()->get('voucher');

        $voucherDetail = $voucher ? $this->voucherInterface->getVoucherByCode($voucher[0]) : null;
        $paymentChannel = $this->tripayService->handlePaymentChannels();
        $cartData = $this->cart;

        return view('student_online_&_offline.transaction.checkout', compact('product', 'paymentChannel', 'cartData', 'voucherDetail'));
    }

    /**
     * save
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return RedirectResponse
     */
    public function save(TransactionRequest $request, Product $product): RedirectResponse
    {
        $transaction = $this->service->handleCheckout($request, $product);
        return to_route('transaction-history.detail', $transaction->id);
    }

    /**
     * saveCourse
     *
     * @param  mixed $request
     * @param  mixed $course
     * @return RedirectResponse
     */
    public function saveCourse(TransactionRequest $request, Course $course): RedirectResponse
    {
        $transaction = $this->service->handleCheckoutCourse($request, $course);
        return to_route('transaction-history.course.detail', $transaction->id);
    }

    /**
     * show
     *
     * @param  mixed $transaction
     * @return View
     */
    public function show(Transaction $transaction)
    {
        $instructions = $this->tripayService->handlePaymentInstruction($transaction->payment_method, $transaction->pay_code, $transaction->amount + $transaction->total_fee);

        return view('student_online_&_offline.transaction.detail', compact('transaction', 'instructions'));
    }

    /**
     * showCourse
     *
     * @param  mixed $transaction
     * @return void
     */
    public function showCourse(Transaction $transaction)
    {
        $instructions = $this->tripayService->handlePaymentInstruction($transaction->payment_method, $transaction->pay_code, $transaction->amount + $transaction->total_fee);
        return view('student_online_&_offline.transaction.detail-course', compact('transaction', 'instructions'));
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

            if ($response && !$response['success']) {
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
            if (session('voucher')) {
                $voucherData = $this->voucherInterface->getVoucherByCode(session('voucher')[0]);

                $this->voucherUsageInterface->store([
                    'vouchers_id' => $voucherData->id,
                    'students_id' => Auth::id(),
                    'transaction_histories_id' => $transactionHistory->id,
                    'used_at' => now(),
                ]);
            }

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

    /**
     * callback
     *
     * @param  mixed $request
     * @return void
     */
    public function callback(Request $request)
    {
        $data = $this->service->handleCallback($request);
        $dataTransaction = $this->transaction->getByMerchantRef($data->merchant_ref);
        $this->transaction->update($dataTransaction->id, [
            'status' => strtolower((string) $data->status),
        ]);

        if ($dataTransaction->product_id == null) {
            $this->activeCourse->store([
                'student_id' => $dataTransaction->user->student->id,
                'course_id' => $dataTransaction->course_id,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menyimpan materi',
            ], 200);
        }
        else {
            $active = $this->activeFeature->getByStudent($dataTransaction->user->student->id);
            $end_date = now()->addDay(30)->format('Y-m-d');
            if ($active) {
                if ($active->is_active == '1') {
                    $end_date = Carbon::createFromFormat('Y-m-d', $active->end_date)->addDay(30);
                }
                else {
                    $end_date = now()->addDay(30)->format('Y-m-d');
                }
            }
            $this->activeFeature->store([
                'student_id' => $dataTransaction->user->student->id,
                'is_active' => 1,
                'end_date' => $end_date,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menyimpan produk',
            ], 200);
        }
    }
}
