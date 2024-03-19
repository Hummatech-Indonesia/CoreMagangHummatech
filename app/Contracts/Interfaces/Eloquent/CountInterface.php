<?php

namespace App\Contracts\Interfaces\Eloquent;

interface CountInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function count(): mixed;
}
