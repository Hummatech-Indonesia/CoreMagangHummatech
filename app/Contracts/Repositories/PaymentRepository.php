<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;

class PaymentRepository extends BaseRepository implements PaymentInterface
{

    public function payment(): mixed
    {
        $apiKey = config('tripay.tripay_api_key');
        // dd($apiKey);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response)->data;
        return $response ? $response : $error;
    }

    public function transaction($method): mixed
    {
        $apiKey       = config('tripay.tripay_api_key');
        $privateKey   = config('tripay.tripay_private_key');
        $merchantCode = config('tripay.merchant_code');
        $merchantRef  = 'PX-' . time();
        $amount = 10000;
        $user = auth()->user();

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            // 'amount'         => $packages->price,
            'amount'         => $amount,
            'customer_name'  => $user->name,
            'customer_email' => $user->email,
            // 'customer_phone' => '081234567890',
            'order_items'    => [
                [
                    'name'        => 'Nama Produk 1',
                    'price'       => $amount,
                    'quantity'    => 1,
                    'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                    'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
                ]
            ],
            'return_url'   => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        dd($response);
        return $response ?: $error;
    }
}
