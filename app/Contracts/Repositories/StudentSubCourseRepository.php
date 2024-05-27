<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentSubCourseInterface;
use App\Models\StudentSubCourse;

class StudentSubCourseRepository extends BaseRepository implements StudentSubCourseInterface
{
    public function __construct(StudentSubCourse $studentSubCourse)
    {
        $this->model = $studentSubCourse;
    }

    /**
     *
     * store
     * @param array $data
     * @return mixed
     *
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->updateOrCreate([
                'student_id' => $data['student_id'],
                'sub_course_id' => $data['sub_course_id'],
            ], $data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     *
     */
    public function getBySubCourse(mixed $id): mixed
    {
        return $this->model->query()
            ->where('sub_course_id', $id)
            ->first();
    }
}
