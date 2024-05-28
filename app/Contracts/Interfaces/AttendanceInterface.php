<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface AttendanceInterface extends StoreInterface, UpdateInterface
{

    /**
     * get attendance by student
     *
     * @param Request $request
     * @return mixed
     */
    function getAttendanceByStudent(Request $request): mixed;

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
    public function yearAttendances(): mixed;
    public function monthAttendances(): mixed;
}
