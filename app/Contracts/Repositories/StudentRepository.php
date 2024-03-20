<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Models\Student;

class StudentRepository extends BaseRepository implements StudentInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    /**
     * listAttendance
     *
     * @return mixed
     */
    public function listAttendance(): mixed
    {
        $date = now();
        return $this->model->query()
            ->whereNotNull('rfid')
            ->withCount(['attendances' => function ($query) {
                $query->whereDate('created_at', now());
            }])
            ->with(['attendances' => function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            }])
            ->whereNull('status')
            ->orderByDesc('attendances_count')
            ->get();
    }


    /**
     * getByRfid
     *
     * @param  mixed $cardId
     * @return void
     */
    public function getByRfid(mixed $cardId)
    {
        return $this->model->query()
            ->where('rfid', $cardId)
            ->firstOrFail();
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function where(): mixed
    {
        return $this->model->query()
            ->where('status', 'accepted')
            ->where('acepted', '1')
            ->get();
    }

    public function listStudent(): mixed
    {
        return $this->model->query()
            ->whereNot('status', 'pending')
            ->get();
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
}
