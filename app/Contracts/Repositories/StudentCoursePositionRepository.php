<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentCoursePositionInterface;
use App\Models\StudentCoursePosition;

class StudentCoursePositionRepository extends BaseRepository implements StudentCoursePositionInterface
{
    public function __construct(StudentCoursePosition $studentCoursePosition)
    {
        $this->model = $studentCoursePosition;
    }

    /**
     *
     * create student course position
     * @param array $data
     * @return mixed
     *
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->updateOrCreate([
                'student_id' => $data['student_id'],
                'course_id' => $data['course_id']
            ], $data);
    }

}

