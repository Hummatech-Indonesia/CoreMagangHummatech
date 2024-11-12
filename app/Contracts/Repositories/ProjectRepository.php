<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProjectInterface;
use App\Enum\PresentationTypeEnum;
use App\Models\Presentation;
use App\Models\Project;
use App\StatusProjectEnum;
use Carbon;

class ProjectRepository extends BaseRepository implements ProjectInterface
{
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     *
     * update by team id
     * @param mixed $id
     * @param array $data
     * @return mixed
     *
     */
    public function updateByTeamId(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->where(
                ['hummatask_team_id', '=', $id],
                ['status', '=', StatusProjectEnum::ACCEPTED->value]
            )
            ->update($data);
    }

    public function get(): mixed
    {
        return $this->model
            ->with('presentation')
            ->get();
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
        $data['start_date'] = Carbon::now()->toDateString();
        $data['status'] = StatusProjectEnum::ACCEPTED->value;

        $this->model->query()
            ->where('hummatask_team_id', $hummataskTeam)
            ->where('id', '!=', $id)
            ->delete();
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function getProjectAccepted($id): mixed
    {
        return $this->model->query()->where('hummatask_team_id', $id)->where('status', '!=', StatusProjectEnum::PENDING->value)->first();
    }

    public function getQueueProjectPresentation($id): mixed
    {
        $data = $this->model->query()
            ->whereHas('presentation', function($query) use ($id){
                $query->where('project_id', $id);
            })
            ->orderBy('created_at','DESC')
            ->first();
        return $data->urutan ?? 0;
    }
    public function upcomingproject(int $userId): mixed
    {
        $lastProject = $this->model->query()
            ->whereHas('members', function ($query) use ($userId) {
                $query->where('member_id', $userId);
            })
            ->orderBy('created_at', 'desc')
            ->first()->type_project ?? '';
        switch ($lastProject) {
            case PresentationTypeEnum::SOLO->value:
                return 5;
            case PresentationTypeEnum::PREMINI->value:
                return 4;
            case PresentationTypeEnum::INTERVIEW->value:
                return 3;
            case PresentationTypeEnum::LIVECODING->value:
                return 2;
            case PresentationTypeEnum::MINI->value:
                return 1;
            case PresentationTypeEnum::BIG->value:
                return 0;
            default:
                return 6;
        }
    }

    public function show($id): mixed
    {
        return $this->model->query()
            ->with(['presentation','members','members.members'])
            ->findOrFail($id);
    }
}
