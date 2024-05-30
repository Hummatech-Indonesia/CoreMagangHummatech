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
     * store
     * @param array $data
     * @return mixed
     *
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
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
        return $this->show($id)
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
        return $this->show($id)
            ->delete();
    }

}
