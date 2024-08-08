<?php

namespace App\Contracts\Repositories;

use App\Models\User;
use App\Models\Student;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Models\CourseUnlock;
use App\Models\SubCourseUnlock;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function get(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->email, function ($query) use ($request) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->where('name', 'LIKE', '%' . $request->email . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->email . '%');
                });
            })
            ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->find($id);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function addCourseToSubcribedUser(int $courseId): void
    {
        $this->model->query()->where('feature', 1)->get()->map(function ($item) use ($courseId) {
            CourseUnlock::create([
                'student_id' => $item->student->id,
                'course_id' => $courseId,
                'unlock' => true
            ]);
        });
    }

    public function addSubCourseToSubcribedUser(int $courseId, mixed $subCourseId): void
    {
        $this->model->query()->where('feature', 1)->get()->map(function ($item) use ($courseId, $subCourseId) {
            SubCourseUnlock::create([
                'student_id' => $item->student->id,
                'course_id' => $courseId,
                'sub_course_id' => $subCourseId,
                'unlock' => true
            ]);
        });
    }

    public function where(string $string, mixed $id): mixed
    {
        return $this->model->query()->where($string, $id)->first();
    }
}
