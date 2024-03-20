<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface TransactionHistoryInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    /**
     * Get single data
     *
     * @param string $id
     * @return mixed
     */
    public function getId(string $id): mixed;
}
