<?php

namespace App\Contracts\Interfaces\Eloquent;

interface PaymentInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function payment(): mixed;
}
