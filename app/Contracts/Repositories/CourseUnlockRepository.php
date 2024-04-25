<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Models\AbsenteePermit;
use App\Models\CourseUnlock;
use App\Models\DataAdmin;
use App\Models\Student;

class CourseUnlockRepository extends BaseRepository implements CourseUnlockInterface
{
    public function __construct(CourseUnlock $absenteePermit)
    {
        $this->model = $absenteePermit;
    }

    public function get(): mixed
    {
        return $this->model->query()->first();
    }
    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->first();
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
