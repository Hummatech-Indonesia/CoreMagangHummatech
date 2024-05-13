<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ResponseLetterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\ResponseLetter;
use App\Models\Student;
use Illuminate\Http\Request;

class ResponseLetterRepository extends BaseRepository implements ResponseLetterInterface
{
    public function __construct(ResponseLetter $responseLetter)
    {
        $this->model = $responseLetter;
    }

    public function get(): mixed
    {
        return $this->model->query()->latest()->get();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
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
