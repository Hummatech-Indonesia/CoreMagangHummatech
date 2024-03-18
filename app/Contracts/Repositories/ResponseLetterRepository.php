<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ResponseLetterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\ResponseLetter;
use App\Models\Student;

class ResponseLetterRepository extends BaseRepository implements ResponseLetterInterface
{
    public function __construct(ResponseLetter $responseLetter)
    {
        $this->model = $responseLetter;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
}
