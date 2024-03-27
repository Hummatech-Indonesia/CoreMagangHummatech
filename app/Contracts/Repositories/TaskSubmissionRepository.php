<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TaskSubmissionInterface;
use App\Models\TaskSubmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TaskSubmissionRepository extends BaseRepository implements TaskSubmissionInterface
{
    public function __construct(TaskSubmission $task)
    {
        $this->model = $task;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);
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
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function download(Model $model): BinaryFileResponse
    {
        dd($model);
        return response()->download($this->model->query()->get()->toArray());
    }
}
