<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Models\Student;
use App\Models\ZoomSchedule;

class ZoomScheduleRepository extends BaseRepository implements ZoomScheduleInterface
{
    public function __construct(ZoomSchedule $zoomSchedule)
    {
        $this->model = $zoomSchedule;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }

    public function get(): mixed
    {
        return $this->model->query()->latest()->get();
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
