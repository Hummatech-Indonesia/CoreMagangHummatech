<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceInterface extends StoreInterface
{
    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return void
     */
    public function checkAttendanceStudent(mixed $studentId);

    /**
     * checkAttendanceToday
     *
     * @param  mixed $data
     * @return mixed
     */
    public function checkAttendanceToday(array $data): mixed;
    public function count($status):mixed;
}
