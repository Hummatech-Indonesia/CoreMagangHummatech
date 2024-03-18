<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceRuleInterface extends GetInterface, StoreInterface {

    /**
     * getByDay
     *
     * @param  mixed $day
     * @return mixed
     */
    public function getByDay(string $day): mixed;
}
