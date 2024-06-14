<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Enum\StatusHummaTeamEnum;
use App\Models\HummataskTeam;
use App\StatusProjectEnum;

class HummataskTeamRepository extends BaseRepository implements HummataskTeamInterface
{

    public function __construct(HummataskTeam $hummatask_team)
    {
        $this->model = $hummatask_team;
    }


    /**
     * getTeamByRfidLeader
     *
     * @param  mixed $rfid
     * @return mixed
     */
    public function getTeamByRfidLeader(mixed $rfid): mixed
    {
        return $this->model->query()
            ->where('status', '=', StatusHummaTeamEnum::ACTIVE->value)
            ->whereRelation('student', 'rfid', '=', $rfid)
            ->first();
    }

    /**
     * getTeamByRfidMember
     *
     * @param  mixed $rfid
     * @return mixed
     */
    public function getTeamByRfidMember(mixed $rfid): mixed
    {
        return $this->model->query()
            ->where('status', '=', StatusHummaTeamEnum::ACTIVE->value)
            ->whereRelation('studentTeams.student_id', 'rfid', '=', $rfid)
            ->first();
    }

    public function WhereTeam(): mixed
    {
        return $this->model->query()->where('division_id' , auth()->user()->mentor->division_id)->get();
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
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

    public function where($parameter, $value): mixed
    {
        return $this->model->query()
        ->where($parameter, $value)
        ->get();
    }

    public function slug(mixed $slug): mixed
    {
        return $this->model->query()->where('slug', $slug)->firstOrFail();
    }

    /**
     * getByStudent
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByStudent(mixed $id): mixed
    {
        return $this->model->query()
            ->where('student_id', $id)
            ->with(['projects' => function ($query) {
                $query->where('status', StatusProjectEnum::ACCEPTED->value);
            }])
            ->orWhereHas('studentTeams', function ($query) use ($id) {
                $query->where('student_id', $id);
            })
            ->get();
    }

}
