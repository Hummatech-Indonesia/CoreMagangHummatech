<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\LimitInterface;
use App\Models\AttendanceDetail;
use App\Models\Limits;

class LimitRepository extends BaseRepository implements LimitInterface
{
    public function __construct(Limits $limit)
    {
        $this->model = $limit;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function first(): mixed
    {
        return $this->model->query()->first();
    }
}
