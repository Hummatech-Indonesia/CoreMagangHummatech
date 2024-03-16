<?php

namespace App\Contracts\Interfaces\Eloquent;

interface WhereInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function where(): mixed;
}
