<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubCourseInterface;
use App\Models\SubCourse;

class SubCourseRepository extends BaseRepository implements SubCourseInterface
{
    public function __construct(SubCourse $subCourse)
    {
        $this->model = $subCourse;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->where('course_id' , $id)->paginate(5);
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

    public function where(mixed $id): mixed
    {
        return $this->model->query()->where('course_id' , $id)->get();
    }
    public function count(): mixed
    {
        return $this->model->query()->count();
    }
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->first();
    }
}
