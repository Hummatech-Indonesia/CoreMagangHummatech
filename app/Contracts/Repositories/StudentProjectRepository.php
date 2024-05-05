<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentProjectInterface;
use App\Models\StudentProject;

class StudentProjectRepository extends BaseRepository implements StudentProjectInterface
{
    public function __construct(StudentProject $studentproject)
    {
        $this->model = $studentproject;
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
    public function where($parameter, $value): mixed
    {
        return $this->model->query()->where($parameter, $value)->get();
    }
}

