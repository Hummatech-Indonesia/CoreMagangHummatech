<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ActiveCourseInterface;
use App\Models\ActiveCourse;

class ActiveCourseRepository extends BaseRepository implements ActiveCourseInterface
{
    public function __construct(ActiveCourse $activeCourse)
    {
        $this->model = $activeCourse;
    }

    /**
     * get by student
     * @param mixed $id
     * @return mixed
     */
    public function getByStudent(mixed $id): mixed
    {
        return $this->model->query()
            ->with('course')
            ->where('student_id', $id)
            ->get();
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
}
