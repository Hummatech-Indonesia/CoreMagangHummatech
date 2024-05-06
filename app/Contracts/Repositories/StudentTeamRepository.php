<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentTeamInterface;
use App\Models\StudentTeam;

class StudentTeamRepository extends BaseRepository implements StudentTeamInterface
{
    public function __construct(StudentTeam $studentTeam)
    {
        $this->model = $studentTeam;
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
    public function getTeamsByMentorId($mentor_id): mixed
    {
        return $this->model->select('hummatask_team_id')->distinct()
        ->join('mentor_students', 'student_teams.student_id', '=', 'mentor_students.student_id')
        ->where('mentor_students.mentor_id', $mentor_id)
        ->get();
    }
}

