<?php

namespace App\Http\Controllers\StudentOfline;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use View;

class StudentOflineController extends Controller
{
    private AttendanceInterface $attendance;
    private CourseInterface $course;
    private WorkFromHomeInterface $workFromHome;

    public function __construct(AttendanceInterface $attendance, CourseInterface $courseInterface, WorkFromHomeInterface $workFromHomeInterface)
    {
        $this->course = $courseInterface;
        $this->attendance = $attendance;
        $this->workFromHome = $workFromHomeInterface;


    }
    public function index()
    {
        $attends = $this->attendance->count('masuk');
        $permissions = $this->attendance->count('izin');
        $sick = $this->attendance->count('sakit');
        $absent = $this->attendance->count('alpha');
        $workFromHomes = $this->workFromHome->getToday();

        return view('student_offline.index', compact('attends', 'permissions', 'sick', 'absent', 'workFromHomes'));
    }

    /**
     * myCourse
     *
     * @return ViewView
     */
    public function myCourse(): ViewView
    {
        $courses = auth()->user()->student->activeCourses;

        return view('student_offline.course.active-course', compact('courses'));
    }
}
