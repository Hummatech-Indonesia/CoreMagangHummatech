<?php
namespace App\Contracts\Repositories;

use App\Models\Mentor;
use App\Models\Journal;
use App\Models\Student;
use App\Models\MentorStudent;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\AdminMentorInterface;
use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class MentorStudentRepository extends BaseRepository implements MentorStudentInterface
{
    public function __construct(MentorStudent $mentor)
    {
        $this->model = $mentor;
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
        return $this->model->query()->where('id', $id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->delete();
    }
}
