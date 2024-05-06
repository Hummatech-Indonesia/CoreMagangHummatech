<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class TripayService {
    /**
     * handleGenerateCallbackSignature
     *
     * @param  mixed $request
     * @return string
     */
    public static function handleGenerateCallbackSignature(Request $request): string
    {
        $privateKey = config('tripay.private_key');

        return hash_hmac('sha256', $request->getContent(), $privateKey);
    }

    /**
     * handleGenerateSignature
     *
     * @param  mixed $invoice_id
     * @param  mixed $amount
     * @return string
     */
    public function handleGenerateSignature(string $invoice_id, int $amount): string
    {
        $privateKey = config('tripay.private_key');
        $merchantCode = config('tripay.merchant_code');

        return hash_hmac('sha256', $merchantCode . $invoice_id . $amount, $privateKey);
    }

    /**
     * handlePaymentChannels
     *
     * @return Collection
     */
    public function handlePaymentChannels(): Collection
    {
        $res = Http::withToken(config('tripay.api_key'))
            ->get(config('tripay.api_url') . "merchant/payment-channel")
            ->json();

        return collect($res['data']);
    }

    /**
     * handlePaymentInstruction
     *
     * @return Collection
     */
    public function handlePaymentInstruction(string $code, string $paycode, int $amount): Collection
    {
        $res = Http::withToken(config('tripay.api_key'))
            ->get(config('tripay.api_url') . "payment/instruction", [
                'code' => $code,
                'pay_code' => $paycode,
                'amount' => $amount,
                'allow_html' => 1,
            ])
            ->json();

        return collect($res['data']);
    }


    /**
     * handleCreateTransaction
     *
     * @param  mixed $data
     * @return array
     */
    public function handleCreateTransaction(array $data): array
    {
        return Http::withToken(config('tripay.api_key'))
            ->post(config('tripay.api_url') . "transaction/create", $data)
            ->json();
    }
}
