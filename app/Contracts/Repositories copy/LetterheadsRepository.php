<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Models\Picket;

class LetterheadsRepository extends BaseRepository implements LetterheadsInterface
{
    public function __construct(Picket $picket)
    {
        $this->model = $picket;
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
}
