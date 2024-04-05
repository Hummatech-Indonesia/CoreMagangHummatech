<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Models\HummataskTeam;

class HummataskTeamRepository extends BaseRepository implements HummataskTeamInterface
{
    private HummataskTeamInterface  $hummatask_team;

    public function __construct(HummataskTeam $hummatask_team)
    {
        $this->model = $hummatask_team;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }

    public function store(array $data): mixed
    {
        $data['student_id'] = auth()->user()->student->id;
        return $this->model->query()
        ->create($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
        ->findOrFail($id)
        ->delete($id);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
        ->findOrFail($id)
        ->update($data);
    }

}
