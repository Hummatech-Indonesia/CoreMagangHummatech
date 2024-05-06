<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface TransactionInterface extends ShowInterface, StoreInterface, UpdateInterface
{
    /**
     * getByMerchantRef
     *
     * @param  mixed $merchantRef
     * @return mixed
     */
    public function getByMerchantRef(string $merchantRef): mixed;
}
