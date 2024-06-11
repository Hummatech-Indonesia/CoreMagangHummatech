<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubmitTaskInterface;
use App\Models\SubmitTask;

class SubmitTaskRepository extends BaseRepository implements SubmitTaskInterface
{
    public function __construct(SubmitTask $submitTask)
    {
        $this->model = $submitTask;
    }

    /**
     * getByAssignment
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByAssignment(mixed $id): mixed
    {
        return $this->model->query()
            ->where('course_assignment_id', $id)
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
            ->updateOrCreate(['course_assignment_id' => $data['course_assignment_id'], 'student_id' => auth()->user()->student->id], $data);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)
            ->update($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)
            ->delete();
    }

}
