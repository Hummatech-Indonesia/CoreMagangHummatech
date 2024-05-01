<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private SubCourseUnlockInterface $subCourseStatus;
    private TaskInterface $taskInterface;
    private CourseUnlockInterface $courseInterface;

    public function __construct(
        SubCourseUnlockInterface $subCourseStatus,
        TaskInterface $taskInterface,
        CourseUnlockInterface $courseInterface
    ) {
        $this->courseInterface = $courseInterface;
        $this->subCourseStatus = $subCourseStatus;
        $this->taskInterface = $taskInterface;
    }

    public function index(Request $request)
    {
        $courses = $this->courseInterface->getCourseByUser(auth()->user()->student->id)
            ->whereHas('course', function ($query) use ($request) {
                if($request->get('search')) {
                    $query->where('title', 'LIKE', '%' . $request->get('search') . '%');
                }
            })->paginate(12);

        return view('student_online.course.index', compact('courses'));
    }

    public function detail(Course $course, Request $request)
    {
        $subCourses = $this->subCourseStatus->getCourseByUser($course->id, auth()->user()->student->id, $request->get('search'));
        return view('student_online.course.detail', compact('course', 'subCourses'));
    }

    public function subCourseDetail(Course $course, SubCourse $subCourse)
    {
        $subCourses = $this->subCourseStatus->getCourseByUser($course->id, auth()->id(), '');
        $totalSubCourses = $this->subCourseStatus->count();
        $subCourseMeta = $subCourse->subCourseUnlock;
        $taskData = $this->taskInterface->getTaskBySubcourse($subCourse->id);
        return view('student_online.course.learn-more', compact('course', 'subCourse', 'subCourses', 'totalSubCourses', 'subCourseMeta', 'taskData'));
    }
}
