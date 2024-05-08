<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface MaxLateInterface extends GetInterface, StoreInterface
{
    /**
     * deleteAll
     *
     * @return mixed
     */
    public function deleteAll(): mixed;
    /**
     * deleteAll
     *
     * @return mixed
     */
    public function GetCount(): mixed;
    public function GetData(): mixed;
}
