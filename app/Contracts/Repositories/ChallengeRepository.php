<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ChallengeInterface;
use App\Models\Challenge;

class ChallengeRepository extends BaseRepository implements ChallengeInterface
{
    public function __construct(Challenge $challenge)
    {
        $this->model = $challenge;
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }

    public function store(array $data): mixed
    {
        $data['mentor_id'] = auth()->user()->mentor->id;
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

    public function getUnsubmittedChallenges($mentor)
    {
        // return $this->model->query()->where('mentor_id', $mentor)
        // ->whereDoesntHave('studentChallenges', function($query) use ($mentor) {
        //     $query->whereHas('student', function($q) use ($mentor) {
        //         $q->whereHas('mentorStudents', function($s) use ($mentor) {
        //             $s->where('mentor_id', $mentor);
        //         });
        //     });
        // })->get();


        return $this->model->query()->where('mentor_id', $mentor)
        ->whereDoesntHave('studentChallenges', function($query) {
            $query->where('student_id', auth()->user()->student->id);
        })->get();
    }

    public function whereMentor(mixed $id): mixed
    {
        return $this->model->query()->where('mentor_id', $id)->get();
    }

}
