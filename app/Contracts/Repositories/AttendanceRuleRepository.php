<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Models\AttendanceRule;

class AttendanceRuleRepository extends BaseRepository implements AttendanceRuleInterface
{
    public function __construct(AttendanceRule $attendanceRule)
    {
        $this->model = $attendanceRule;
    }

    /**
     * getByDay
     *
     * @param  mixed $day
     * @return mixed
     */
    public function getByDay(string $day): mixed
    {
        return $this->model->query()
            ->where('day', $day)
            ->first();
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
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
            ->updateOrCreate(['day' => $data['day']], $data);
    }
}
