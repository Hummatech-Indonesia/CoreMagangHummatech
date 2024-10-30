<?php

namespace App\Contracts\Repositories;

use App\Models\Institution;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\InstitutionInterface;

class InstitutionRepository extends BaseRepository implements InstitutionInterface
{
    public function __construct(Institution $institution)
    {
        $this->model = $institution;
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
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function search(Request $request):mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        });

        return $query;
    }
}
