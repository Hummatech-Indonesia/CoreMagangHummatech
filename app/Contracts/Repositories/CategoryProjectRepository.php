<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Models\CategoryProject;
use Illuminate\Http\Request;

class CategoryProjectRepository extends BaseRepository implements CategoryProjectInterface
{

    public function __construct(CategoryProject $categoryProject)
    {
        $this->model = $categoryProject;
    }

     public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->update($data);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return void
     */
    public function checkAttendanceStudent(mixed $studentId)
    {
        return $this->model->query()
            ->where(['student_id' => $studentId])
            ->whereDate('created_at', now()
            ->format('Y-m-d'))->first();
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
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
