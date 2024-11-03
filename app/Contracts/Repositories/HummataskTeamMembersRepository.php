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
        return $this->model->where('presentation_id', $data->id)->get();
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