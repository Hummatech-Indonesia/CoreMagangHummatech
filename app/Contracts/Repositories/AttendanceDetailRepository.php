<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Models\AttendanceDetail;

class AttendanceDetailRepository extends BaseRepository implements AttendanceDetailInterface
{
    public function __construct(AttendanceDetail $attendanceDetail)
    {
        $this->model = $attendanceDetail;
    }


    public function checkAttendanceToday(array $data): mixed
    {
        return $this->model->query()
            ->whereDate('created_at', now())
            ->where('status', $data['status'])
            ->where('attendance_id', $data['attendance_id'])
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
            ->updateOrCreate(
                ['attendance_id' => $data['attendance_id'], 'status' => $data['status']],
                ['status' => $data['status']]
            );
    }
}
