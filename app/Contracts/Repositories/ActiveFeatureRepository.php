<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ActiveFeatureInterface;
use App\Models\ActiveFeature;

class ActiveFeatureRepository extends BaseRepository implements ActiveFeatureInterface
{

    public function __construct(ActiveFeature $activeFeature)
    {
        $this->model = $activeFeature;
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->where('student_id', $id);
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
            ->updateOrCreate([
                'student_id' => $data['student_id']
            ], $data);
    }
}
