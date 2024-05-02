<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\MaxLateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private MaxLateInterface $maxLate;
    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface, MaxLateInterface $maxLateInterface)
    {
        $this->maxLate = $maxLateInterface;
        $this->student = $studentInterface;
        $this->attendance = $attendanceInterface;
    }

    /**
     * storeMaxLate
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function storeMaxLate(MaxLateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->maxLate->store($data);
        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $onlineAttendances = $this->student->listAttendance();
        $oflineAttendances = $this->student->listOfflineAttendance();
        return view('admin.page.absent.index', compact('onlineAttendances', 'oflineAttendances'));
    }

    public function attendanceOffline(Request $request): View
    {
        $offlineAttendances = $this->student->listOfflineAttendance();
        return view('student_offline.absensi.index', compact('offlineAttendances'));
    }

    public function attendanceOnline(Request $request): View
    {
        $onlineAttendances = $this->student->listAttendance();
        return view('student_online.absensi.index',compact('onlineAttendnaces'));
    }
}
