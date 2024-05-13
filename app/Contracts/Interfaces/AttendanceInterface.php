<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface AttendanceInterface extends StoreInterface, UpdateInterface
{
    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return mixed
     */
    public function checkAttendanceStudent(mixed $studentId): mixed;

    /**
     * checkAttendanceToday
     *
     * @param  mixed $data
     * @return mixed
     */
    public function checkAttendanceToday(array $data): mixed;
    public function count($status):mixed;
}
