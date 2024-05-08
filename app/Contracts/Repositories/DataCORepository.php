<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\DataCOInterface;
use App\Models\AbsenteePermit;
use App\Models\DataAdmin;
use App\Models\DataCO;
use App\Models\Student;

class DataCORepository extends BaseRepository implements DataCOInterface
{
    public function __construct(DataCO $dataCO)
    {
        $this->model = $dataCO;
    }

    public function get(): mixed
    {
        return $this->model->query()->first();
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
