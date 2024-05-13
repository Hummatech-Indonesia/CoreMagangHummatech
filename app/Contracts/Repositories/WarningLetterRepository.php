<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\WarningLetterInterface;
use App\Models\Journal;
use App\Models\WarningLetter;
use Illuminate\Http\Request;

class WarningLetterRepository extends BaseRepository implements WarningLetterInterface
{
    public function __construct(WarningLetter $warningLetter)
    {
        $this->model = $warningLetter;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function search(Request $request):mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->whereRelation('student', 'name', 'LIKE', '%' . $request->name . '%');
        });

        return $query;
    }
}
