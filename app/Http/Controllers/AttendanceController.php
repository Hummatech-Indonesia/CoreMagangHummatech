<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\StudentInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    private AttendanceInterface $attendance;
    private StudentInterface $student;
    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface)
    {
        $this->student = $studentInterface;
        $this->attendance = $attendanceInterface;
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $onlineAttendances = $this->student->listAttendance();
        $oflineAttendances = $this->student->listOflineAttendance();
        return view('admin.page.absent.index', compact('onlineAttendances', 'oflineAttendances'));
    }
}
