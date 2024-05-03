<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Models\Attendance;
class CategoryProjectRepository extends BaseRepository implements CodeOfConductInterface
{
    
    public function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->update($data);
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
    public function checkAttendanceStudent(mixed $studentId)
    {
        return $this->model->query()
            ->where(['student_id' => $studentId])
            ->whereDate('created_at', now()
            ->format('Y-m-d'))->first();
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }
}
