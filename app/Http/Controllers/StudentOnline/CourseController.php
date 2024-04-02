<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private SubCourseUnlockInterface $subCourseStatus;

    public function __construct(CourseInterface $course, SubCourseInterface $subCourse, SubCourseUnlockInterface $subCourseStatus)
    {
        $this->middleware('subsrcribed');
        $this->subCourse = $subCourse;
        $this->course = $course;
        $this->subCourseStatus = $subCourseStatus;
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
        return view('student_online.course.learn-more', compact('course' , 'subCourse', 'subCourses', 'totalSubCourses', 'subCourseMeta'));
    }
}
