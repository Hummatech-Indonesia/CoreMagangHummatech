<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Http\Requests\MaxLateRequest;
use Carbon\Carbon;
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
    private AttendanceRuleInterface $attendanceRule;
    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface, MaxLateInterface $maxLateInterface, WorkFromHomeInterface $workFromHomeInterface, AttendanceDetailInterface $attendanceDetailInterface, AttendanceRuleInterface $attendanceRuleInterface, )
    {
        $this->attendanceRule = $attendanceRuleInterface;
        $this->maxLate = $maxLateInterface;
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
        $time = now()->format('H:i:s');
        $attendanceData = [
            'student_id' => auth()->user()->student->id,
        ];
        $max = $this->maxLate->get();
        $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));
        if (!$ruleToday) {
            return back()->with('error', 'Tidak ada jam absen hari ini');
        }
        if (!$attendance = $this->attendance->checkAttendanceToday(['student_id' => auth()->user()->student->id, 'created_at' => now()])) {
            $attendance = $this->attendance->store($attendanceData);
        }
        if ($time >= $ruleToday->checkin_starts && $time <= Carbon::createFromFormat('H:i:s', $ruleToday->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) {
            return $this->attendanceDetail->store(['status' => 'present', 'attendance_id' => $attendance->id]);
        } else if ($time >= $ruleToday->checkout_starts && $time <= $ruleToday->checkout_ends) {
            $this->attendanceDetail->store(['status' => 'return', 'attendance_id' => $attendance->id]);
        }
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
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        $onlineAttendances = $this->student->listAttendance($request);
        $oflineAttendances = $this->student->listOfflineAttendance($request);
        return view('admin.page.absent.index', compact('onlineAttendances', 'oflineAttendances'));
    }

    public function attendanceOffline(Request $request): View
    {
        $attends = $this->attendance->count('masuk');
        $permissionCount = $this->attendance->count('izin');
        $sick = $this->attendance->count('sakit');
        $absent = $this->attendance->count('alpha');
        $permissions = $sick + $permissionCount;
        $total = $attends + $permissionCount + $sick + $absent;
        $workFromHomes = $this->workFromHome->getToday();
        $offlineAttendances = $this->student->listOfflineAttendance($request);
        return view('student_offline.absensi.index', compact('offlineAttendances','attends','permissions','absent', 'total', 'workFromHomes'));
    }

    public function attendanceOnline(Request $request): View
    {
        $onlineAttendances = $this->student->listAttendance($request);
        return view('student_online.absensi.index',compact('onlineAttendances'));
    }
}
