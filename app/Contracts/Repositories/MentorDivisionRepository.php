<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Journal;
use App\Models\MentorDivision;
use App\Models\Student;

class MentorDivisionRepository extends BaseRepository implements MentorDivisionInterface
{
    public function __construct(MentorDivision $mentorDivision)
    {
        $this->model = $mentorDivision;
    }

    public function get(): mixed
    {
        return $this->model->query()->with('division')->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function whereMentor($id): mixed
    {
        return $this->model->query()->where('mentor_id', $id)->get();
    }
    public function where(mixed $id): mixed
    {
        return $this->model->query()->where('division_id', $id)->with('division')->get();
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->where('mentor_id', $id)->delete();
    }
    public function whereMentorDivision(mixed $id): mixed
    {
        return $this->model->query()->where('division_id', $id)->get();;
    }

}
