<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceDetailInterface extends StoreInterface
{
    public function checkAttendanceToday(array $data): mixed;

    /**
     *
     * store attendance detail
     * @param array $data
     * @return mixed
     */
    public function storeOnline(array $data): mixed;
}
