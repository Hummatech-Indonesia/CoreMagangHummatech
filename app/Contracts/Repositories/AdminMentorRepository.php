<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\AdminMentorInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Journal;
use App\Models\Mentor;
use App\Models\Student;

class AdminMentorRepository extends BaseRepository implements AdminMentorInterface
{
    public function __construct(Mentor $mentor)
    {
        $this->model = $mentor;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
}
