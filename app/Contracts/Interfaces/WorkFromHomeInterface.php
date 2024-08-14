<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface WorkFromHomeInterface extends StoreInterface
{
    /**
     * getToday
     *
     * @return mixed
     */
    public function getToday(): mixed;
    public function getYesterday(): mixed;
}
