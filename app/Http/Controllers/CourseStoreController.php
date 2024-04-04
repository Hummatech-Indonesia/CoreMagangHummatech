<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class CourseStoreController extends Controller
{
    private CourseInterface $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        return view('student_online_&_offline.course-store.index');
    }
}
