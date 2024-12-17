<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProjectRevisionInterface;
use App\Enum\RevisionStatusEnum;
use App\Models\ProjectRevision;

class ProjectRevisionRepository extends BaseRepository implements ProjectRevisionInterface
{
    function __construct(ProjectRevision $model)
    {
        $this->model = $model;
    }

    public function update(mixed $id, array $data): mixed
    {
        $model = $this->model->find($id);

        return $model->update($data);
    }

    public function delete(mixed $id): mixed
    {
        $model = $this->model->find($id);

        return $model->delete();
    }

    public function getRevisionByPresentation(int $presentationId, string $status = null)
    {
        return $this->model->query()
            ->where('presentation_id', $presentationId)
            ->when($status !== null, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->get();
    }

    public function getRevisionByProject(int $projectId, string $status = null)
    {
        return $this->model->query()
            ->whereHas('presentation.project', function ($query) use ($projectId) {
                $query->where('id', $projectId);
            })
            ->when($status !== null, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->create([
            'revision' => $data['revision'],
            'status' => $data['status'],
            'presentation_id' => $data['presentation_id']
        ])->assignedStudent()->attach($data['member_ids']);
    }
}
