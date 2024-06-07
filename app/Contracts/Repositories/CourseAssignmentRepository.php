<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseAssignmentInterface;
use App\Models\CourseAssignment;

class CourseAssignmentRepository extends BaseRepository implements CourseAssignmentInterface
{
    public function __construct(CourseAssignment $courseAssignment)
    {
        $this->model = $courseAssignment;
    }

    /**
     * getByCourse
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByCourse(mixed $id): mixed
    {
        return $this->model->query()
            ->where('course_id', $id)
            ->get();
    }

    /**
     * store
     * @param array $data
     * @return mixed
     *
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->updateOrCreate([
                'course_id' => $data['course_id'],
            ], $data);
    }

    /**
     * show get by id
     * @param mixed $id
     * @return mixed
     *
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->with(['submitTasks' => function ($query) {
                $query->where('student_id', auth()->user()->student->id);
            }])
            ->findOrFail($id);
    }

    /**
     *
     * update
     * @param mixed $id
     * @param array $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

    /**
     *
     * delete
     * @param mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

}
