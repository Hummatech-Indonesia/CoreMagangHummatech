<?php

namespace App\Contracts\Interfaces\Transaction;

interface TransactionInterface
{
    /**
     * Define transaction rule
     *
     * @param mixed $method Payment methode code based on Tripay Payment Code List (See https://tripay.co.id/#price)
     * @param int $totalAmount The total amount of payments
     * @param mixed $products List of product
     *
     * @return mixed
     */
    public function transaction(mixed $method, int $totalAmount, mixed $products): mixed;
}
