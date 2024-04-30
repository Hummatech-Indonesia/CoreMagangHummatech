<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginationInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\Whereterface;

interface OrderInterface extends
    GetInterface,
    StoreInterface,
    UpdateInterface,
    DeleteInterface,
    PaginationInterface
{
    public function where(mixed ...$clause): mixed;
    public function when(mixed ...$clause): mixed;
}
