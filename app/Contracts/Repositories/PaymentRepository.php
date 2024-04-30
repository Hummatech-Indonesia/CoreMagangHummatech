<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enum\TransactionStatusEnum;
use App\Models\CourseUnlock;
use App\Models\SubCourseUnlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentRepository extends BaseRepository implements PaymentInterface
{
    private string $apiKey;
    private string $privateKey;
    private string $merchantCode;
    private string $mode;
    private TransactionHistoryInterface $transaction;
    private UserInterface $userInterface;
    private CourseInterface $courseInterface;

    public function __construct(
        TransactionHistoryInterface $transaction,
        UserInterface $userInterface,
        CourseInterface $courseInterface,
    ) {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->mode = config('tripay.mode') === 'sandbox' ? 'api-sandbox' : 'api'; // Sandbox | Production
        $this->transaction = $transaction;
        $this->userInterface = $userInterface;
        $this->courseInterface = $courseInterface;
    }

    /**
     * Action to handle the payment for the Course Buy.
     *
     * @param mixed $courses
     * @param string $status
     * @param mixed $invoiceInstance
     * @return void
     */
    private function _buyCourseAction(mixed $courses, string $status, mixed $invoiceInstance)
    {
        if ($status === TransactionStatusEnum::PAID->value) {
            CourseUnlock::create([
                'student_id' => $invoiceInstance->user->student->id,
                'course_id' => $courses->id,
                'unlock' => true,
            ]);

            $courses->subCourse?->map(function ($subItem) use ($invoiceInstance, $courses) {
                SubCourseUnlock::create([
                    'student_id' => $invoiceInstance->user->student->id,
                    'course_id' => $courses->id,
                    'sub_course_id' => $subItem->sub_course_id,
                    'unlock' => true,
                ]);
            });
        }
    }

    /**
     * Action to handle the payment for the Subscription.
     *
     * @param mixed $invoice
     * @param string $status
     * @param mixed $invoiceInstance
     * @return void
     */
    private function _subscriptionAction(mixed $invoice, string $status, mixed $invoiceInstance)
    {
        if ($status === TransactionStatusEnum::PAID->value) {
            $this->userInterface->GetWhere($invoice->user_id)->update(['feature' => true]);

            $this->courseInterface->getCourseByStatus('subcribe')->map(function ($item) use ($invoiceInstance) {
                CourseUnlock::create([
                    'student_id' => $invoiceInstance->user->student->id,
                    'course_id' => $item->id,
                    'unlock' => true,
                ]);

                $item->subCourse->map(function ($subItem) use ($invoiceInstance, $item) {
                    SubCourseUnlock::create([
                        'student_id' => $invoiceInstance->user->student->id,
                        'course_id' => $item->id,
                        'sub_course_id' => $subItem->sub_course_id,
                        'unlock' => true,
                    ]);
                });
            });
        } else {
            $this->userInterface->GetWhere($invoiceInstance->user_id)->update(['feature' => false]);
        }
    }

    public function getPaymentDetail(string $id): mixed
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])
            ->withOptions([
                "verify" => false,
                "timeout" => 60, // Timeout set to 60 seconds
            ])
            ->get("https://tripay.co.id/{$this->mode}/transaction/detail", [
                'reference' => $id
            ]);

        return $response->json();
    }

    public function getPaymentChannel(): mixed
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])
            ->withOptions([
                "verify" => false,
                "timeout" => 60, // Timeout set to 60 seconds
            ])
            ->get("https://tripay.co.id/{$this->mode}/merchant/payment-channel");

        return $response->json();
    }

    public function transaction(mixed $method, int $totalAmount, mixed $products): mixed
    {
        $apiKey       = $this->apiKey;
        $privateKey   = $this->privateKey;
        $merchantCode = $this->merchantCode;
        $merchantRef  = 'MAGANG-' . time();

        $user = Auth::user();

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $totalAmount,
            'customer_name'  => $user->name,
            'customer_email' => $user->email,
            'customer_phone' => $user->student->phone,
            'order_items'    => $products,
            'return_url'     => route('transaction-history.index'),
            'callback_url'   => route('transaction-history.callback'),
            'expired_time'   => (time() + (24 * 60 * 60)),
            'signature'      => hash_hmac('sha256', $merchantCode . $merchantRef . $totalAmount, $privateKey)
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
        ])
            ->withOptions([
                "verify" => false,
                "timeout" => 60, // Timeout set to 60 seconds
            ])
            ->post("https://tripay.co.id/{$this->mode}/transaction/create", $data);

        return $response->json();
    }

    public function callback(Request $request): mixed
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
                'code' => 400,
            ], 400);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return response()->json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
                'code' => 400,
            ], 400);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
                'code' => 400
            ], 400);
        }

        try {
            $invoiceId = $data->merchant_ref;
            $tripayReference = $data->reference;
            $status = strtolower((string) $data->status);

            if ($data->is_closed_payment === 1) {
                $invoiceInstance = $this->transaction->getId($tripayReference);
                $invoice = $invoiceInstance->first();
                $invoiceData = $invoice->order;

                if ($invoiceInstance->count() === 0) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No invoice found or already paid: ' . $invoiceId,
                        'code' => 404
                    ], 404);
                }

                if ($invoiceData->course) {
                    $this->_buyCourseAction($invoice, $status, $invoiceData);
                } else if (!$invoiceData->course) {
                    $this->_subscriptionAction($invoice, $status, $invoiceData);
                } else {
                    throw new \Exception('No invoice found or already paid: ' . $invoiceId);
                }

                $invoiceInstance->update([
                    'status' => $status,
                    'paid_at' => $status == TransactionStatusEnum::PAID->value ? now() : null,
                ]);

                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later!',
                'code' => 500,
                'error' => env('APP_DEBUG') ? $e->getMessage() : null,
                'debug' => env('APP_DEBUG') ? [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTrace(),
                ] : null,
            ], 500);
        }
    }
}
