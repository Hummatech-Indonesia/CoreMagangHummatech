<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceRuleResource;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * entryTime
     *
     * @return JsonResponse
     */
    public function entryTime(): JsonResponse
    {
        $rule = $this->attendanceRule
            ->get();

        $attendanceCount = $rule
            ->count();

        $data['md5'] = md5($rule);
        $data['result'] = AttendanceRuleResource::collection($rule);
        $data['attendance_count'] = $attendanceCount;

        return response()->json($data);
    }

    /**
     * sync
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function sync(Request $request): JsonResponse
    {
        foreach ($request->data as $data) {
            $attendanceData = [
                'student_id' => $data['user_id'],
                'status' => $data['status'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ];

            // Cek apakah data presensi untuk mahasiswa ini sudah ada
            $existingAttendance = $this->attendance->checkAttendanceToday(['student_id' => $data['user_id'], 'created_at' => $data['created_at']]);
            if ($existingAttendance) {
                // Jika data presensi sudah ada, lanjutkan ke data detail presensi
                foreach ($data['detail_attendances'] as $detailAttendance) {
                    $dataAttendanceDetail['attendance_id'] = $existingAttendance->id;
                    $dataAttendanceDetail['status'] = $detailAttendance['status'];
                    $dataAttendanceDetail['created_at'] = $detailAttendance['created_at'];
                    $dataAttendanceDetail['updated_at'] = $detailAttendance['updated_at'];
                    if (!$this->attendanceDetail->checkAttendanceToday(['status' => $detailAttendance['status'], 'attendance_id' => $existingAttendance->id])) {
                        $this->attendanceDetail->store($dataAttendanceDetail);
                    }
                }
            } else {
                // Jika data presensi belum ada, buat entri baru
                $attendance = $this->attendance->store($attendanceData);

                foreach ($data['detail_attendances'] as $detailAttendance) {
                    $dataAttendanceDetail['attendance_id'] = $attendance->id;
                    $dataAttendanceDetail['status'] = $detailAttendance['status'];
                    $dataAttendanceDetail['created_at'] = $detailAttendance['created_at'];
                    $dataAttendanceDetail['updated_at'] = $detailAttendance['updated_at'];
                    if (!$this->attendanceDetail->checkAttendanceToday(['status' => $detailAttendance['status'], 'attendance_id' => $attendance->id])) {
                        $this->attendanceDetail->store($dataAttendanceDetail);
                    }
                }
            }
        }

        return response()->json(['message' => 'Sinkronisasi Presensi Berhasil', 'code' => 200]);
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
     * doAttendanceOnline
     *
     * @return mixed
     */
    private function doAttendanceOnline(): mixed
    {
        $max = $this->maxLate->get();
        $today = now()->format('l');
        $student = auth()->user()->student;
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
        } else if ($time >= $attendanceRule->checkout_starts && $time <= $attendanceRule->checkout_ends) {
            return $this->attendanceDetail->store(['attendance_id' => $attendance_id, 'status' => 'return']);
        }
        return null;
    }

    /**
     * onlinePresence
     *
     * @return JsonResponse
     */
    public function onlinePresence(): JsonResponse
    {
        $today = now()->format('l');
        $attendanceRule = $this->attendanceRule->getByDay($today);
        if (!$attendanceRule) return ResponseHelper::error(null, "Tidak ada jam absen hari ini");
        $doAttendance = $this->doAttendanceOnline();
        if (!$doAttendance) return ResponseHelper::error(null, "Jam absensi tidak tersedia");
        if (!$doAttendance->wasRecentlyCreated) return ResponseHelper::error(null, "Anda telah absensi pada jam ini");
        return ResponseHelper::success(auth()->user()->student, "Berhasil absensi");
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
