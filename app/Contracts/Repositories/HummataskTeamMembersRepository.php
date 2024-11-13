<?php

namespace App\Contracts\Repositories;
use App\Contracts\Interfaces\HummataskTeamMembersInterface;
use App\Models\HummataskTeamMembers;

class HummataskTeamMembersRepository extends BaseRepository implements HummataskTeamMembersInterface
{
    public function __construct(HummataskTeamMembers $hummataskTeamMembers)
    {
        $this->model = $hummataskTeamMembers;
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->insert($data);
    }
    public function getStudentByPresentation(mixed $data): mixed
    {
        return $this->model
            ->query()
            ->with(['members','members.faces'])
            ->where('project_id', $data)->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        foreach ($data as $value) {
            $this->model
                ->where('presentation_id', $id)
                ->delete();
        }
        return $this->store($data);
    }
}
