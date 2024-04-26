<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseInterface;
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
    private SubCourseUnlockInterface $subCourseStatus;
    private TaskInterface $taskInterface;

    public function __construct(CourseInterface $course, SubCourseUnlockInterface $subCourseStatus, TaskInterface $taskInterface)
    {
        $this->course = $course;
        $this->subCourseStatus = $subCourseStatus;
        $this->taskInterface = $taskInterface;
    }

    public function index(Request $request)
    {
        $courses = $this->course->GetWhere(auth()->user()->student->division_id);
        return view('student_online.course.index' , compact('courses'));
    }

    public function detail(Course $course, Request $request)
    {
        $subCourses = $this->subCourseStatus->getCourseByUser($course->id, auth()->id(), $request->get('search'));
        return view('student_online.course.detail' , compact('course', 'subCourses'));
    }

    public function subCourseDetail(Course $course, SubCourse $subCourse)
    {
        $subCourses = $this->subCourseStatus->getCourseByUser($course->id, auth()->id(), '');
        $totalSubCourses = $this->subCourseStatus->count();
        $subCourseMeta = $subCourse->subCourseUnlock;
        $taskData = $this->taskInterface->getTaskBySubcourse($subCourse->id);
        return view('student_online.course.learn-more', compact('course' , 'subCourse', 'subCourses', 'totalSubCourses', 'subCourseMeta', 'taskData'));
    }
}
