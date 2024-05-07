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
