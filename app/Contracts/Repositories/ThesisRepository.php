<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Models\Thesis;

class ThesisRepository extends BaseRepository implements ThesisInterface
{
    public function __construct(Thesis $thesis)
    {
        $this->model = $thesis;
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
        $data['student_id'] = auth()->user()->student->id;
        return $this->model->query()
            ->create($data);
    }
    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return void
     */


    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }
}
