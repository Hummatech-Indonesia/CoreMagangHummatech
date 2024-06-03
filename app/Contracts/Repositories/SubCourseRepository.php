<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubCourseInterface;
use App\Models\Course;
use App\Models\CourseUnlock;
use App\Models\SubCourse;
use App\Models\SubCourseUnlock;
use Auth;

class SubCourseRepository extends BaseRepository implements SubCourseInterface
{
    public function __construct(SubCourse $subCourse)
    {
        $this->model = $subCourse;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function GetWhere(mixed $id): mixed
    {
        return $this->model->query()->where('course_id' , $id)->paginate(5);
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->firstOrCreate($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function where(mixed $id): mixed
    {
        return $this->model->query()->where('course_id' , $id)->get();
    }
    public function count(): mixed
    {
        return $this->model->query()->count();
    }
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->first();
    }
    public function whereCourse(mixed $id): mixed
    {
        return $this->model->query()->where('course_id', $id)->get();
    }
    public function addToBoughtCourse(mixed $subCourse): void
    {
        $courseUnlock = CourseUnlock::find($subCourse->course_id);
        if ($courseUnlock) {
            SubCourseUnlock::createOrFirst([
                'sub_course_id' => $subCourse->id,
                'course_id' => $subCourse->course_id,
                'student_id' => $courseUnlock->id,
                'unlock' => 1
            ]);
        }
    }

    /**
     *
     * get latest position by course
     * @param mixed $id
     * @return mixed
     *
     */
    public function getLatestPositionByCourse(mixed $id): mixed
    {
        return $this->model->query()
            ->where('course_id', $id)
            ->orderByDesc('position')
            ->first();
    }
}
