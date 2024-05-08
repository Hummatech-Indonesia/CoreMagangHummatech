<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\MaxLateInterface;
use App\Models\MaxLate;

class MaxLateRepository extends BaseRepository implements MaxLateInterface {

    public function __construct(MaxLate $maxLate)
    {
        $this->model = $maxLate;
    }

    public function GetCount(): mixed
    {
        return $this->model->query()
        ->count();
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
    public function GetData(): mixed
    {
        return $this->model->query()
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
