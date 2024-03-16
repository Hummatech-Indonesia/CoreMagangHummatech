<?php

namespace App\Contracts\Interfaces\Eloquent;

interface TransactionInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function transaction($method): mixed;
}
