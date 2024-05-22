<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Enum\InternshipTypeEnum;
use App\Enum\StatusJournalEnum;
use App\Models\Journal;
use Carbon\Carbon;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    /**
     *
     * get by student offline
     * @return mixed
     *
     */
    public function getByStudentOffline(): mixed
    {
        return $this->model->query()
            ->whereRelation('student', 'internship_type', InternshipTypeEnum::OFFLINE->value)
            ->get();
    }
    /**
     *
     * get by student online
     * @return mixed
     *
     */
    public function getByStudentOnline(): mixed
    {
        return $this->model->query()
            ->whereRelation('student', 'internship_type', InternshipTypeEnum::ONLINE->value)
            ->get();
    }

    public function getjournal()
    {
        return $this->model->query()->get();
    }

    public function get(): mixed
    {
        return $this->model->query()->where('student_id', auth()->user()->student->id)->latest()->paginate(10);
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

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function CountJournalFillin()
    {
        return $this->model->query()
        ->where('status' , 'fillin')
        ->where('student_id' , auth()->user()->student->id)
        ->count();
    }
    public function CountJournalNotFillin()
    {
        return $this->model->query()
        ->where('student_id' , auth()->user()->student->id)
        ->where('status' , 'notfilling')
        ->count();
    }
}
