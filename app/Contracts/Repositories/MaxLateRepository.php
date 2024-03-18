<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\MaxLateInterface;
use App\Models\MaxLate;

class MaxLateRepository extends BaseRepository implements MaxLateInterface {

    public function __construct(MaxLate $maxLate)
    {
        $this->model = $maxLate;
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->latest()
            ->first();
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
     * deleteAll
     *
     * @return mixed
     */
    public function deleteAll(): mixed
    {
        return $this->model->query()
            ->delete();
    }
}
