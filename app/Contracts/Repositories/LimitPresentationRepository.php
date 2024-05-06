<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Models\AttendanceDetail;
use App\Models\LimitPresentation;
use Carbon\Carbon;


class LimitPresentationRepository extends BaseRepository implements LimitPresentationInterface
{
    public function __construct(LimitPresentation $limit)
    {
        $this->model = $limit;
    }
    public function get(): mixed
    {
        return $this->model->query()
            ->whereDate('created_at', Carbon::today())
            ->where('mentor_id' , auth()->user()->mentor->id)
            ->first();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function first(): mixed
    {
        return $this->model->query()->first();
    }
}
