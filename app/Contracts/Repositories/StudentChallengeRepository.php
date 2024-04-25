<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentChallengeInterface;
use App\Enum\ChallengeStatusEnum;
use App\Models\StudentChallenge;

class StudentChallengeRepository extends BaseRepository implements StudentChallengeInterface
{
    public function __construct(StudentChallenge $studentChallenge)
    {
        $this->model = $studentChallenge;
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
    public function getByStatus(string $status): mixed
    {
        return $this->model->query()->where('status', $status)->get();
    }
    public function whereChallenge(mixed $id) : mixed
    {
        return $this->model->query()->where('challenge_id', $id)->get();
    }
    public function whereStudentChallenge(mixed $mentor, mixed $challenge, mixed $student): mixed
    {
        return $this->model->query()->where('mentor_id', $mentor)->where('challenge_id', $challenge)->where('student_id', $student)->get();
    }
    public function whereChallengePending(mixed $student):mixed 
    {
        return $this->model->query()->where('student_id', $student)->where('status', ChallengeStatusEnum::PENDING->value)->get();
    }
    public function whereChallengeDone(mixed $student):mixed 
    {
        return $this->model->query()->where('student_id', $student)->where('status', ChallengeStatusEnum::COMPLETED->value)->get();
    }
}
