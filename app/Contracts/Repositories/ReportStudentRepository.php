<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PicketInterface;
use App\Contracts\Interfaces\ReportStudenttInterface;
use App\Models\ReportStudent;

class ReportStudentRepository extends BaseRepository implements ReportStudenttInterface
{
    public function __construct(ReportStudent $reportStudent)
    {
        $this->model = $reportStudent;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        $data['student_id'] = auth()->user()->student->id;
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
