<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\AdminMentorInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\RolesEnum;
use App\Models\Journal;
use App\Models\Mentor;
use App\Models\Student;
use Illuminate\Http\Request;

class MentorRepository extends BaseRepository implements MentorInterface
{
    public function __construct(Mentor $mentor)
    {
        $this->model = $mentor;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        $mentor =  $this->model->query()->create($data);
        $mentor->assignRole(RolesEnum::OFFLINE->value);
        return $mentor;
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->where('id', $id)->update($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->find($id);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->delete();
    }

    public function search(Request $request): mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        });
        return $query;
    }

}
