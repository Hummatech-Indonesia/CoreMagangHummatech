<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\WarningLetterInterface;
use App\Models\Journal;
use App\Models\WarningLetter;

class WarningLetterRepository extends BaseRepository implements WarningLetterInterface
{
    public function __construct(WarningLetter $warningLetter)
    {
        $this->model = $warningLetter;
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
