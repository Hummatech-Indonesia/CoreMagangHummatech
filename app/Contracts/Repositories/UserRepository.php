<?php
namespace App\Contracts\Repositories;

use App\Models\User;
use App\Models\Student;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->find($id)->first();
    }
}
