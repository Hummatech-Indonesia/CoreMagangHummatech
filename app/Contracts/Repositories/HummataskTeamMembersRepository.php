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
}
