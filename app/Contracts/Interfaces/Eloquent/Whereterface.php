<?php

namespace App\Contracts\Interfaces\Eloquent;

interface Whereterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

     public function where(mixed $id): mixed;
}
