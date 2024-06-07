<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private SubCourseUnlockInterface $subCourseStatus;
    private TaskInterface $taskInterface;
    private CourseUnlockInterface $courseInterface;

    public function __construct(
        SubCourseInterface $subCourseInterface,
        CourseInterface $course,
        SubCourseUnlockInterface $subCourseStatus,
        TaskInterface $taskInterface,
        CourseUnlockInterface $courseInterface
    ) {
        $this->subCourse = $subCourseInterface;
        $this->course = $course;
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
        $course = $this->course->show($course->id);
        $subCourses = $this->subCourse->getByCourse($course->id, $request);
        return view('student_online.course.detail', compact('course', 'subCourses'));
    }

    public function subCourseDetail(Course $course, SubCourse $subCourse)
    {
        return view('student_online.course.learn-more', compact('course', 'subCourse'));
    }
}
