<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{
    public function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
    }

    /**
     * get attendance by student
     * @param Request $request
     * @return mixed
     */
    public function getAttendanceByStudent(Request $request): mixed
    {
        return $this->model->query()
            ->where('student_id', auth()->user()->student->id)
            ->latest()
            ->get();
    }

    /**
     * checkAttendanceToday
     *
     * @param  mixed $data
     * @return mixed
     */
    public function checkAttendanceToday(array $data): mixed
    {
        return $this->model->query()
            ->whereDate('created_at', $data['created_at'])
            ->where('student_id', $data['student_id'])
            ->first();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return void
     */
    public function checkAttendanceStudent(mixed $studentId): mixed
    {
        return $this->model->query()
            ->where(['student_id' => $studentId])
            ->whereDate('created_at', now()
            ->format('Y-m-d'))->first();
    }

    /**
     * @param mixed $id
     * @param array $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

    public function count($status): mixed
    {
        return $this->model->query()
        ->where('student_id', auth()->user()->student->id)
        ->where('status', $status)
        ->count();
    }

}
