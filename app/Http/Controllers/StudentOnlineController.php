<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class StudentOnlineController extends Controller
{
    private CourseInterface $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->GetWhere(auth()->user()->student->division_id);
        return view('student_online.course.index' , compact('courses'));
    }
}
