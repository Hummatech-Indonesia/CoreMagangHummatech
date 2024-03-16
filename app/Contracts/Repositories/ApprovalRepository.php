<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ApprovalInterface;
use App\Models\Student;

class ApprovalRepository extends BaseRepository implements ApprovalInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function where(): mixed
    {
        return $this->model->query()->where('status' , 'pending')->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

}
