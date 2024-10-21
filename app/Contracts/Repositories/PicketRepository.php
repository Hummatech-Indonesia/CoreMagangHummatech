<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PicketInterface;
use App\Models\Picket;

class PicketRepository extends BaseRepository implements PicketInterface
{
    public function __construct(Picket $picket)
    {
        $this->model = $picket;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        $students = [];
        if (is_array($data['student_ids'])) {
            foreach ($data['student_ids'] as $student) {
                $students[] = [
                    'tim' => $data['tim'],
                    'day_picket' => $data['day_picket'],
                    'student_id' => $student
                ];
            }
        } else {
            $students[] = [
                'tim' => $data['tim'],
                'day_picket' => $data['day_picket'],
                'student_id' => $data['student_ids']
            ];
        }
        return $this->model->query()->insert($students);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
}
