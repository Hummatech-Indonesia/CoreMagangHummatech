<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Models\WorkFromHome;

class WorkFromHomeRepository extends BaseRepository implements WorkFromHomeInterface
{
    public function __construct(WorkFromHome $workFromHome)
    {
        $this->model = $workFromHome;
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->updateOrCreate(
                ['date' => $data['date']],
                $data
            );
    }

    /**
     * getToday
     *
     * @return mixed
     */
    public function getToday(): mixed
    {
        return $this->model->query()
            ->whereDate('date', now()->format('Y-m-d'))
            ->first();
    }
}
