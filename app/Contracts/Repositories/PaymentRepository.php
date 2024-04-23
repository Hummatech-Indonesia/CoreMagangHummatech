<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enum\TransactionStatusEnum;
use App\Models\CourseUnlock;
use App\Models\SubCourseUnlock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    private SubCourseInterface $subCourseInterface;

    public function __construct(TransactionHistoryInterface $transaction, UserInterface $userInterface, CourseInterface $courseInterface, SubCourseInterface $subCourseInterface)
    {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->mode = config('tripay.mode') === 'sandbox' ? 'api-sandbox' : 'api'; // Sandbox | Production
        $this->transaction = $transaction;
        $this->userInterface = $userInterface;
        $this->courseInterface = $courseInterface;
        $this->subCourseInterface = $subCourseInterface;
    }

    private function _buyCourseAction(mixed $courses, string $status, mixed $invoiceInstance)
    {
        if ($status === TransactionStatusEnum::PAID->value) {
            $courses->map(function($items) use ($invoiceInstance, $status) {
                CourseUnlock::create([
                    'student_id' => $invoiceInstance->user->student->id,
                    'course_id' => $items->id,
                ]);

                $items->subCourse->map(function($subItem) use ($invoiceInstance, $items) {
                    SubCourseUnlock::create([
                        'student_id' => $invoiceInstance->user->student->id,
                        'course_id' => $items->id,
                        'sub_course_id' => $subItem->sub_course_id,
                    ]);
                });
            });
        }
    }

    private function _subscriptionAction(mixed $invoice, string $status, mixed $invoiceInstance)
    {
        if ($status === TransactionStatusEnum::PAID->value) {
            $this->userInterface->GetWhere($invoice->user_id)->update(['feature' => true]);

            $this->courseInterface->getCourseByStatus('subcribe')->map(function($item) use ($invoiceInstance) {
                CourseUnlock::create([
                    'student_id' => $invoiceInstance->user->student->id,
                    'course_id' => $item->id,
                ]);

                $item->subCourse->map(function($subItem) use ($invoiceInstance, $item) {
                    SubCourseUnlock::create([
                        'student_id' => $invoiceInstance->user->student->id,
                        'course_id' => $item->id,
                        'sub_course_id' => $subItem->sub_course_id,
                    ]);
                });
            });
        } else {
            $this->userInterface->GetWhere($invoice->user_id)->update(['feature' => false]);
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
            'callback_url'   => url('transaction/callback'),
            'return_url'     => url('/'),
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

        $invoiceId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtolower((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $invoiceInstance = $this->transaction->getId($tripayReference);
            $invoice = $invoiceInstance->first();

            if ($invoiceInstance->count() === 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $invoiceId,
                    'code' => 404
                ], 404);
            }

            $invoiceInstance->update([
                'status' => $status,
                'paid_at' => $status == TransactionStatusEnum::PAID->value ? now() : null,
            ]);

            if($invoiceInstance->order->course) {
                $this->_buyCourseAction($invoiceInstance->order->course, $status, $invoiceInstance);
            } else {
                $this->_subscriptionAction($invoice, $status, $invoiceInstance);
            }

            return response()->json(['success' => true]);
        }
    }
}
