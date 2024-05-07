<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface TransactionInterface extends GetInterface, ShowInterface, StoreInterface, UpdateInterface, SearchInterface
{
    /**
     * getByMerchantRef
     *
     * @param  mixed $merchantRef
     * @return mixed
     */
    public function getByMerchantRef(string $merchantRef): mixed;

    /**
     * getByUser
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByUser(mixed $id): mixed;
}
