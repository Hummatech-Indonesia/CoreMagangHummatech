<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Models\Letterhead;
use App\Models\Picket;

class LetterheadsRepository extends BaseRepository implements LetterheadsInterface
{
    public function __construct(Letterhead $letterhead)
    {
        $this->model = $letterhead;
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

    public function whereauth($authId): mixed
    {
        return $this->model->query()->where('user_id', $authId)->first();
    }
}
