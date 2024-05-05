<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProjectInterface;
use App\Models\Project;

class ProjectRepository extends BaseRepository implements ProjectInterface
{
    public function __construct(Project $project)
    {
        $this->model = $project;
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
    public function where($parameter, $value): mixed
    {
        return $this->model->query()->where($parameter, $value)->get();
    }
}

