<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PicketingReportInterface;
use App\Models\PicketingReport;
use Carbon\Carbon;

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
    public function getToday(): mixed
    {
        return $this->model->query()
                    ->whereDate('created_at', Carbon::now()->toDateString()) 
                    ->where('user_id', auth()->user()->id)
                    ->first(); 
    }
}
