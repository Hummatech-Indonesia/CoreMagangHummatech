<?php

namespace App\Contracts\Repositories;

use App\Models\Project;
use App\StatusProjectEnum;
use App\Models\Presentation;
use Illuminate\Support\Carbon;
use App\Enum\ProjectAcceptStatus;
use App\Enum\PresentationTypeEnum;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Interfaces\ProjectInterface;

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
            ->with(['presentation.revision', 'members', 'members.members'])
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

    public function where($parameter, $value, $perPage = 15, $columns = ['*'], $pageName = 'page'): mixed
    {
        return $this->model->query()
            ->where($parameter, $value)
            ->paginate($perPage, $columns, $pageName);
    }

    public function whereIn($parameter, array $values, $perPage = 15, $columns = ['*'], $pageName = 'page'): mixed
    {
        return $this->model->query()
            ->whereIn($parameter, $values)
            ->paginate($perPage, $columns, $pageName);
    }



    public function accProject(mixed $id, array $data): mixed
    {
        $data['start_date'] = Carbon::now()->toDateString();
        $data['status'] = ProjectAcceptStatus::ACCEPT->value;
        $data['mentor_id'] = Auth::user()->mentors_id;

        //        $this->model->query()
        //            ->where('id', '!=', $id)
        //            ->delete();
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function rejectProject(mixed $id, array $data): mixed
    {
        $data['start_date'] = Carbon::now()->toDateString();
        $data['status'] = ProjectAcceptStatus::REJECTED->value;
        $data['mentor_id'] = Auth::user()->mentors_id;

        // $this->model->query()
        //     ->where('id', '!=', $id)
        //     ->delete();
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function getProjectAccepted($id): mixed
    {
        return $this->model->query()->where('hummatask_team_id', $id)->where('status', '!=', StatusProjectEnum::PENDING->value)->first();
    }

    public function getQueueProjectPresentation($id): mixed
    {
        $data = $this->model->query()
            ->whereHas('presentation', function ($query) use ($id) {
                $query->where('project_id', $id);
            })
            ->orderBy('created_at', 'DESC')
            ->first();
        return $data->urutan ?? 0;
    }

    public function upcomingproject(int $userId): mixed
    {
        $lastProject = $this->model->query()
            ->whereHas('members', function ($query) use ($userId) {
                $query->where('member_id', $userId);
            })
            ->orderBy('id', 'desc')
            ->first()->type_project->value ?? '';
        return match ($lastProject) {
            PresentationTypeEnum::SOLO->value => 5,
            PresentationTypeEnum::PREMINI->value => 4,
            PresentationTypeEnum::INTERVIEW->value => 3,
            PresentationTypeEnum::LIVECODING->value => 2,
            PresentationTypeEnum::MINI->value => 1,
            PresentationTypeEnum::BIG->value => 0,
            default => 6,
        };
    }

    public function show($id): mixed
    {
        return $this->model->query()
            ->with(['presentation', 'members', 'members.members'])
            ->findOrFail($id);
    }

    public function getProjectRevision(int $projectId): mixed
    {
        $project = Project::with('presentation.revision')->find($projectId);

        return $project?->presentation?->revision->count() ?? 0;
    }

    public function getProjectWithRevision(int $projectId, $parameter = null, $value = null)
    {
        return $this->model->query()
            ->with(['presentation.revision' => function ($query) use ($parameter, $value) {
                if ($parameter && $value) {
                    $query->where($parameter, $value);
                }
            }])
            ->find($projectId);
    }
}
