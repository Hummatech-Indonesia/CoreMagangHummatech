<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;
use App\Contracts\Interfaces\MajorInterface;
use App\Models\Major;

class MajorRepository extends BaseRepository implements MajorInterface
{
    public function __construct(Major $major)
    {
        $this->model = $major;
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

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })->get();
    }
}
