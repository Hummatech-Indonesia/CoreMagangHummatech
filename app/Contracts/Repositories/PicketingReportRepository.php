<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\PicketingReport;
use App\Models\Student;

class PicketingReportRepository extends BaseRepository implements PicketingReportInterface
{
    public function __construct(PicketingReport $picketingReport)
    {
        $this->model = $picketingReport;
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
