<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Http\Requests\MaxLateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private MaxLateInterface $maxLate;
    private WorkFromHomeInterface $workFromHome;
    private AttendanceDetailInterface $attendanceDetail;
    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface, MaxLateInterface $maxLateInterface, WorkFromHomeInterface $workFromHomeInterface, AttendanceDetailInterface $attendanceDetailInterface)
    {
        $this->attendanceDetail = $attendanceDetailInterface;
        $this->workFromHome = $workFromHomeInterface;
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
     * absentOnline
     *
     * @return RedirectResponse
     */
    public function absentOnline(): RedirectResponse
    {
        $attendanceData = [
            'student_id' => auth()->user()->student->id,
        ];
        if (!$attendance = $this->attendance->checkAttendanceToday(['student_id' => auth()->user()->student->id, 'created_at' => now()])) {
            $attendance = $this->attendance->store($attendanceData);
        }
        $this->attendanceDetail->store(['status' => 'present', 'attendance_id' => $attendance->id]);
        return redirect()->back()->with('success', "Berhasil absen");
    }

    /**
     * storeWorkFromHome
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function storeWorkFromHome(Request $request): RedirectResponse
    {
        $isOn = 0;
        if ($request->has('is_on')) $isOn = 1;
        $this->workFromHome->store(['date' => now()->format('Y-m-d'), 'is_on' => $isOn]);
        return redirect()->back()->with('success', 'Berhasil merubah status');
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
        return view('student_online.absensi.index',compact('onlineAttendances'));
    }
}
