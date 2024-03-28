<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseInterface $course;
    private SubCourseInterface $subCourse;

    public function __construct(CourseInterface $course, SubCourseInterface $subCourse)
    {
        $this->middleware('subsrcribed');
        $this->subCourse = $subCourse;
        $this->course = $course;
    }

    public function index(Request $request)
    {
        $courses = $this->course->GetWhere(auth()->user()->student->division_id);
        return view('student_online.course.index' , compact('courses'));
    }

    public function detail(Course $course, Request $request)
    {
        $subCourses = $course->subCourse
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            });
        return view('student_online.course.detail' , compact('course', 'subCourses'));
    }

    public function subCourseDetail(Course $course, SubCourse $subCourse)
    {
        $subCourses = $this->subCourse->GetWhere($course->id);
        return view('student_online.course.learn-more' , compact('course' , 'subCourse', 'subCourses'));
    }
}
