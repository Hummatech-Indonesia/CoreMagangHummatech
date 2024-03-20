<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\Transaction\TransactionInterface;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Enum\TransactionStatusEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentRepository extends BaseRepository implements PaymentInterface
{
    private string $apiKey;
    private string $privateKey;
    private string $merchantCode;
    private string $mode;
    private TransactionHistoryInterface $transaction;

    public function __construct(TransactionHistoryInterface $transaction)
    {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->mode = config('tripay.mode') === 'sandbox' ? 'api-sandbox' : 'api'; // Sandbox | Production
        $this->transaction = $transaction;
    }

    public function getPaymentDetail(string $id): mixed
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])
            ->withOptions(["verify" => false])
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
            ->withOptions(["verify" => false])
            ->get("https://tripay.co.id/{$this->mode}/merchant/payment-channel");

        return $response->json();
    }

    public function transaction($method, $totalAmount, $products): mixed
    {
        $apiKey       = $this->apiKey;
        $privateKey   = $this->privateKey;
        $merchantCode = $this->merchantCode;
        $merchantRef  = 'MAGANG-' . time();

        $user = auth()->user();

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
            ->withOptions(["verify" => false])
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
            $invoice = $this->transaction->getId($tripayReference)->first();

            if (!$invoice) {
                return response()->json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $invoiceId,
                    'code' => 404
                ], 404);
            }

            $invoice->update([
                'status' => $status,
                'paid_at' => $status === TransactionStatusEnum::PAID->value ? now() : null,
            ]);

            if($status === TransactionStatusEnum::PAID->value) {
                User::where('id', $invoice->user_id)->update(['feature' => true]);
            } else {
                User::where('id', $invoice->user_id)->update(['feature' => false]);
            }

            return response()->json(['success' => true]);
        }
    }
}
