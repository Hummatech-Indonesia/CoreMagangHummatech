<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProjectInterface;
use App\Models\Project;
use App\StatusProjectEnum;
use Carbon;

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
    public function accProject(mixed $id, array $data, $hummataskTeam): mixed
    {
        $data['start_end'] = Carbon::now()->toDateString();
        $data['status'] = StatusProjectEnum::ACCEPTED->value;
        
        $this->model->query()
            ->where('hummatask_team_id', $hummataskTeam)
            ->where('id', '!=', $id)
            ->delete();
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function getProjectAccepted($id): mixed
    {
        return $this->model->query()->where('hummatask_team_id', $id)->where('status', StatusProjectEnum::ACCEPTED->value)->first();
    }
}

