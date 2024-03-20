<?php

namespace App\Contracts\Interfaces\Transaction;

interface GetPaymentDetailInterface
{
    /**
     * Getting the payment detail from Tripay
     *
     * @param string $id The ID reference from tripay
     * @return mixed
     */
    public function getPaymentDetail(string $id): mixed;
}
