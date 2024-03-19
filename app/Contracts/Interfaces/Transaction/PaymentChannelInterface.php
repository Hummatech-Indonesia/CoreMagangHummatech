<?php

namespace App\Contracts\Interfaces\Transaction;

interface PaymentChannelInterface
{
    /**
     * Get the payment channels.
     *
     * @return mixed
     */
    public function getPaymentChannel(): mixed;
}
