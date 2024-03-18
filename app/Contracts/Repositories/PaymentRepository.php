<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PaymentInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class PaymentRepository extends BaseRepository implements PaymentInterface
{
    private string $apiKey;
    private string $privateKey;
    private string $merchantCode;
    private string $mode;

    public function __construct()
    {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->mode = config('tripay.mode') === 'sandbox' ? 'api-sandbox' : 'api'; // Sandbox | Production
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
        $merchantRef  = 'PX-' . time();

        $user = auth()->user();

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $totalAmount,
            'customer_name'  => $user->name,
            'customer_email' => $user->email,
            'customer_phone' => '081234567890',
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
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return response()->json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        // $invoiceId = $data->merchant_ref;
        // $tripayReference = $data->reference;
        // $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            // $invoice = Invoice::where('id', $invoiceId)
            //     ->where('reference', $tripayReference)
            //     ->where('status', '=', 'UNPAID')
            //     ->first();

            // if (! $invoice) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'No invoice found or already paid: ' . $invoiceId,
            //     ]);
            // }

            // switch ($status) {
            //     case 'PAID':
            //         $invoice->update(['status' => 'PAID']);
            //         break;

            //     case 'EXPIRED':
            //         $invoice->update(['status' => 'EXPIRED']);
            //         break;

            //     case 'FAILED':
            //         $invoice->update(['status' => 'FAILED']);
            //         break;

            //     default:
            //         return response()->json([
            //             'success' => false,
            //             'message' => 'Unrecognized payment status',
            //         ]);
            // }

            return response()->json(['success' => true]);
        }
    }
}
