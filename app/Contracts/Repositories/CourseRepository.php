<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Models\Course;
use App\Models\Journal;

class CourseRepository extends BaseRepository implements CourseInterface
{
    public function __construct(Course $course)
    {
        $this->model = $course;
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
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function count(): mixed
    {
        return $this->model->query()->count();
    }

    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->where('division_id' , $id)->get();
    }

}
