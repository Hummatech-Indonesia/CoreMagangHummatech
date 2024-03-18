<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private MaxLateInterface $maxLate;
    private AttendanceRuleInterface $attendanceRule;
    private AttendanceDetailInterface $attendanceDetail;
    public function __construct(StudentInterface $studentInterface, AttendanceRuleInterface $attendanceRuleInterface, MaxLateInterface $maxLateInterface, AttendanceInterface $attendanceInterface, AttendanceDetailInterface $attendanceDetailInterface)
    {
        $this->attendanceDetail = $attendanceDetailInterface;
        $this->attendance = $attendanceInterface;
        $this->maxLate = $maxLateInterface;
        $this->attendanceRule = $attendanceRuleInterface;
        $this->student = $studentInterface;
    }

    /**
     * getStudentByRfid
     *
     * @param  mixed $rfid
     * @return mixed
     */
    private function getStudentByRfid($rfid): mixed
    {
        $studentByCard = $this->student->getByRfid($rfid);
        if ($studentByCard) return ResponseHelper::error(null, "Siswa tidak ditemukan");
        return $studentByCard;
    }

    /**
     * doAttendanceNow
     *
     * @param  mixed $rfid
     * @return mixed
     */
    private function doAttendanceNow($rfid): mixed
    {
        $max = $this->maxLate->get();
        $today = now()->format('l');
        $student = $this->getStudentByRfid($rfid);
        $time = now()->format('H:i:s');
        $attendanceRule = $this->attendanceRule->getByDay($today);

        if (!$attendance = $this->attendance->checkAttendanceStudent($student->id)) {
            if ($time > Carbon::createFromFormat('H:i:s', $attendanceRule->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) return ResponseHelper::error(null, "Tidak bisa absen karena telat saat masuk pagi!");
            $attendance = $this->attendance->store(['student_id' => $student->id]);
        }
        $attendance_id = $attendance->id;
        if ($time >= $attendanceRule->checkin_starts && $time <= Carbon::createFromFormat('H:i:s', $attendanceRule->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) {
            // FirebaseNotificationHelper::send($this->getStudentByRfid($rfid)->hasOneUser->id, "Absensi", "Berhasil absensi pagi");
            return $this->attendanceDetail->store(['attendance_id' => $attendance_id, 'status' => 'present']);
        } else if ($time >= $attendanceRule->break_starts && $time <= $attendanceRule->break_ends) {
            return $this->attendanceDetail->store(['attendance_id' => $attendance_id, 'status' => 'break']);
        } else if ($time >= $attendanceRule->return_starts && $time <= Carbon::createFromFormat('H:i:s', $attendanceRule->return_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) {
            return $this->attendanceDetail->store(['attendance_id' => $attendance_id, 'status' => 'return_break']);
        } else if ($time >= $attendanceRule->checkout_starts && $time <= $attendanceRule->checkout_ends) {
            return $this->attendanceDetail->store(['attendance_id' => $attendance_id, 'status' => 'return']);
        }
        return null;
    }

    /**
     * attendanceByRfid
     *
     * @param  mixed $rfid
     * @return JsonResponse
     */
    public function attendanceByRfid($rfid): JsonResponse
    {
        $today = now()->format('l');
        $attendanceRule = $this->attendanceRule->getByDay($today);
        if (!$attendanceRule) return ResponseHelper::error(null, "Tidak ada jam absen hari ini");
        $doAttendance = $this->doAttendanceNow($rfid);

        if (!$doAttendance) return ResponseHelper::error(null, "Jam absensi tidak tersedia");
        if (!$doAttendance->wasRecentlyCreated) return ResponseHelper::error(null, "Anda telah absensi pada jam ini");
        return ResponseHelper::success($this->getStudentByRfid($rfid), "Berhasil absensi");
    }
}
