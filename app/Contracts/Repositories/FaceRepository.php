<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\FaceInterface;
use App\Models\Face;

class FaceRepository extends BaseRepository implements FaceInterface
{
    public function __construct(Face $face)
    {
        $this->model = $face;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
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

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
        ->where('student_id', $id)
        ->get();
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('student_id', $id)
            ->delete();
    }
}
