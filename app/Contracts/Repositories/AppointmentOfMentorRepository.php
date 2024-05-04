<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\AppointmentOfAmentor;

class AppointmentOfMentorRepository extends BaseRepository implements AppointmentOfMentorInterface
{
    public function __construct(AppointmentOfAmentor $appointmentOfAmentor)
    {
        $this->model = $appointmentOfAmentor;
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

    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }
}
