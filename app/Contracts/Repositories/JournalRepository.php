<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Enum\StatusJournalEnum;
use App\Models\Journal;
use Carbon\Carbon;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function getjournal()
    {
        return $this->model->query()->get();
    }

    public function get(): mixed
    {
        return $this->model->query()->where('student_id', auth()->user()->student->id)->latest()->get();
    }

    public function store(array $data): mixed
    {
        $data['student_id'] = auth()->user()->student->id;
        $data['status'] = StatusJournalEnum::FILLIN->value;
        return $this->model->query()->create($data);
    }

    public function where(): mixed
    {
        return $this->model->query()
            ->where('student_id', auth()->user()->student->id)
            ->where('created_at', '>=', now()->startOfDay())
            ->where('created_at', '<=', now()->endOfDay())
            ->first();
    }
    public function update(mixed $id, array $data): mixed
    {
        $data['student_id'] = auth()->user()->student->id;
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function whereStudent(mixed $id): mixed
    {
        return $this->model->query()->where('student_id', $id)->get();
    }
}
