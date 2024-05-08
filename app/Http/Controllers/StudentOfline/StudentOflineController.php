<?php

namespace App\Http\Controllers\StudentOfline;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentOflineController extends Controller
{
    private AttendanceInterface $attendance;
    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }
    public function index()
    {
        $attends = $this->attendance->count('masuk');
        $permissions = $this->attendance->count('izin');
        $sick = $this->attendance->count('sakit');
        $absent = $this->attendance->count('alpha');
        return view('student_offline.index', compact('attends', 'permissions', 'sick', 'absent'));
    }
}
