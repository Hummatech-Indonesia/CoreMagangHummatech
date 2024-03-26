<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DivisionInterface;
use App\Models\Division;

class DivisionRepository extends BaseRepository implements DivisionInterface
{
    public function __construct(Division $division)
    {
        $this->model = $division;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function where(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->get();
    }
}

