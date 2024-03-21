<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AbsenteePermitInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\AbsenteePermit;
use App\Models\Student;

class AbsenteePermitRepository extends BaseRepository implements AbsenteePermitInterface
{
    public function __construct(AbsenteePermit $absenteePermit)
    {
        $this->model = $absenteePermit;
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
