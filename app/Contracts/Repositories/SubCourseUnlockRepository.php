<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Models\SubCourseUnlock;

class SubCourseUnlockRepository extends BaseRepository implements SubCourseUnlockInterface
{
    public function __construct(SubCourseUnlock $subCourse)
    {
        $this->model = $subCourse;
    }

    public function count(): mixed
    {
        return $this->model->query()->count();
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function getCourseByUser(mixed $subCourse, mixed $userId, ?string $search = ''): mixed
    {
        return $this->model->query()->where([
            ['course_id', $subCourse],
            ['student_id', $userId],
        ])->whereHas('subCourse', function ($query) use ($search) {
            $query->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            });
        })->paginate(12);
    }
    public function where(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->first();
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->where('id', $id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->where('id', $id)->delete();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
}
