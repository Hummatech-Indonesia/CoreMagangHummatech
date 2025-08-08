<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AdminAttendanceInterface;
use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Enum\DayEnum;
use App\Http\Requests\AttendanceStatusRequest;
use App\Http\Requests\MaxLateRequest;
use App\Models\Attendance;
use App\Models\DataAdmin;
use App\Models\Journal;
use App\Models\Letterhead;
use App\Models\Signature;
use App\Models\Student;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceController extends Controller
{

    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private MaxLateInterface $maxLate;
    private WorkFromHomeInterface $workFromHome;
    private AttendanceDetailInterface $attendanceDetail;
    private AttendanceRuleInterface $attendanceRule;
    private AdminAttendanceInterface $adminAttendance;
    private AttendanceService $attendanceService;

    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface, MaxLateInterface $maxLateInterface, WorkFromHomeInterface $workFromHomeInterface, AttendanceDetailInterface $attendanceDetailInterface, AttendanceRuleInterface $attendanceRuleInterface, AdminAttendanceInterface $adminAttendance, AttendanceService $attendanceService)
    {
        $this->attendanceRule = $attendanceRuleInterface;
        $this->maxLate = $maxLateInterface;
        $this->attendanceDetail = $attendanceDetailInterface;
        $this->workFromHome = $workFromHomeInterface;
        $this->maxLate = $maxLateInterface;
        $this->student = $studentInterface;
        $this->attendance = $attendanceInterface;
        $this->adminAttendance = $adminAttendance;
        $this->attendanceService = $attendanceService;
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


    public function absentOnline(): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $now = Carbon::now();
            $max = $this->maxLate->get();

            $attendance = $this->attendance->checkAttendanceToday([
                'student_id' => auth()->user()->student->id,
                'created_at' => now()->startOfDay(),
            ]);

            $ruleToday = $this->attendanceRule->getByDay($now->format('l'));

            if (!$ruleToday) {
                return back()->with('error', 'Tidak ada jam absen hari ini');
            }

            if (!$attendance) {
                $attendance = $this->attendance->store([
                    'attendance_type' => 'online',
                    'student_id' => auth()->user()->student->id,
                    'created_at' => now()->startOfDay(),
                ]);
            }

            $isCheckinTime = $this->attendanceService->isInTime($now, 'checkin', $max, $ruleToday);
            $isCheckoutTime = $this->attendanceService->isInTime($now, 'checkout', $max, $ruleToday);

            if (!$isCheckinTime && !$isCheckoutTime) {
                return back()->with('error', 'Bukan waktu absen');
            }

            $statusToCheck = $isCheckinTime ? 'present' : 'return';
            $attendanceDetail = $this->attendanceDetail->getByAttendanceAndStatus($attendance->id, [$statusToCheck])->where('created_at', '>=', now()->startOfDay());
            if ($attendanceDetail->count() > 0) {
                return back()->with('error', 'Anda sudah melakukan absen ' . ($statusToCheck == 'present' ? 'masuk' : 'pulang') . ' hari ini');
            }

            $this->attendanceDetail->store([
                'status' => $statusToCheck,
                'attendance_id' => $attendance->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->back()->with('success', "Berhasil absen");
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gagal absen: '.$th->getMessage());
        }
    }


    // public function absentOffline(Request $request): RedirectResponse
    // {
    //     $time = now()->format('H:i:s');
    //     $max = $this->maxLate->get();
    //     $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));
    //     if (!$ruleToday) {
    //         return back()->with('error', 'Tidak ada jam absen hari ini');
    //     }
    //     if (!$attendance = $this->attendance->checkAttendanceToday(['student_id' => $request->student_id, 'created_at' => now()])) {
    //         $attendance = $this->attendance->store($request->all());
    //     }
    //     if ($time >= $ruleToday->checkin_starts && $time <= Carbon::createFromFormat('H:i:s', $ruleToday->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) {
    //         return $this->attendanceDetail->store(['status' => 'present', 'attendance_id' => $attendance->id]);
    //     } else if ($time >= $ruleToday->checkout_starts && $time <= $ruleToday->checkout_ends) {
    //         $this->attendanceDetail->store(['status' => 'return', 'attendance_id' => $attendance->id]);
    //     }
    //     return redirect()->back()->with('success', "Berhasil absen");
    // }

    public function absentOffline(Request $request): RedirectResponse
    {
        $time = now()->format('H:i:s');
        $max = $this->maxLate->get();
        $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));

        if (!$ruleToday) {
            return back()->with('error', 'Tidak ada jam absen hari ini');
        }

        $existingAttendance = $this->attendance->checkAttendanceToday([
            'student_id' => $request->student_id,
            'created_at' => now()->startOfDay(),
        ]);

        if (!$existingAttendance) {
            $existingAttendance = $this->attendance->store([
                'student_id' => $request->student_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $attendanceDetails = $this->attendanceDetail->getByAttendanceAndStatus($existingAttendance->id, ['present', 'return']);

        if ($attendanceDetails->count() > 0) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absen untuk tipe ini hari ini.');
        }

        if ($time >= $ruleToday->checkin_starts && $time <= Carbon::createFromFormat('H:i:s', $ruleToday->checkin_ends)->addMinutes($max ? (int)$max->minute : 15)->format('H:i:s')) {
            $this->attendanceDetail->store([
                'status' => 'present',
                'attendance_id' => $existingAttendance->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif ($time >= $ruleToday->checkout_starts && $time <= $ruleToday->checkout_ends) {
            $this->attendanceDetail->store([
                'status' => 'return',
                'attendance_id' => $existingAttendance->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', "Berhasil absen");
    }



    /**
     * @param AttendanceStatusRequest $request
     * @return RedirectResponse
     */
    public function changeAttendanceStatus(AttendanceStatusRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $attendanceStudent = $this->attendance->checkAttendanceStudent($data['student_id']);

        if ($attendanceStudent) {
            $this->attendance->update($attendanceStudent->id, ['status' => $data['status'], 'is_admin' => 1]);
        } else {
            $this->attendance->store([
                'student_id' => $data['student_id'],
                'status' => $data['status'],
                'is_admin' => 1,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan status');
    }

    /**
     * storeWorkFromHome
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function storeWorkFromHome(Request $request): RedirectResponse
    {
        $wfh = $this->workFromHome->getToday();

        if (!$wfh) {
            if ($request->has('is_on')) $isOn = 1;
        } elseif ($wfh->is_on == 1) {
            $isOn = 0;
        } elseif ($wfh->is_on == 0) {
            $isOn = 1;
        }
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
        $students = $this->student->get($request);
        $wfh = $this->workFromHome->getToday();
        $rule = $this->attendanceRule->getByDay(now()->format('l'));
        $attendanceYears = $this->attendance->yearAttendances();
        $attendanceMonth = $this->attendance->monthAttendances();

        // dd($attendanceYears, $attendanceMonth);
        return view('admin.page.absent.index', compact('attendanceYears', 'attendanceMonth', 'onlineAttendances', 'oflineAttendances', 'students', 'wfh', 'rule'));
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
        $offlineAttendances = $this->student->studentOfflineAttendance($request);
        $attendances = $this->attendance->getAttendanceByStudent($request);
        $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));

        // dd($attendances);

        $years = $attendances->pluck('created_at')
        ->filter()
        ->map(function ($date) {
            return $date->format('Y');
        })
        ->unique()->sort()->values();

        $months = $attendances->pluck('created_at')->map(function ($date) {
            return $date->format('m');
        })->unique()->sort()->values();

        $year = request()->get('year', $years->first());
        $month = request()->get('month', $months->first());

        return view('student_offline.absensi.index', compact('attendances', 'offlineAttendances', 'attends', 'permissions', 'absent', 'total', 'workFromHomes', 'ruleToday','years', 'months', 'year', 'month'));
    }
    public function downloadPDF(Request $request)
    {
        // Set waktu eksekusi dan memori
        ini_set('max_execution_time', 300); // 5 menit
        ini_set('memory_limit', '512M'); // 512MB

        // Validasi input
        $request->validate([
            'year' => 'required|digits:4',
            'month' => 'required|integer|min:1|max:12',
        ]);

        // Ambil data dalam potongan kecil untuk efisiensi
        $months = [];
        Attendance::with('attendanceDetails')
            ->where('student_id', auth()->user()->student->id)
            ->whereYear('created_at', $request->input('year'))
            ->whereMonth('created_at', $request->input('month'))
            ->chunk(100, function ($attendances) use (&$months) {
                foreach ($attendances as $attendance) {
                    $monthKey = \Carbon\Carbon::parse($attendance->created_at)->format('Y-m');
                    $months[$monthKey][] = $attendance;
                }
            });

        $header = Letterhead::where('user_id', auth()->user()->id)->first();
        $datadiri = Student::where('id', auth()->user()->student->id)->first();

        // Cek kop surat
        if (!$header) {
            return redirect()->back()->with('error', 'Harap mengisi kop surat terlebih dahulu');
        }

        // Siapkan Dompdf
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        $combinedHtml = ''; // Untuk menggabungkan semua halaman PDF
        $dataadmin = DataAdmin::query()->first();

        // Proses setiap bulan
        foreach ($months as $monthKey => $attendance) {
            // Generate QR code
            $signature = Signature::create([
                'qr' => '',
                'data_admin_id' => $dataadmin->id
            ]);

            $qrCode = QrCode::size(100)->generate(url('/data-qr/' . $signature->id));
            $qrCodeImage = 'data:image/png;base64,' . base64_encode($qrCode);

            $signature->qr = $qrCodeImage;
            $signature->save();

            // Render HTML untuk bulan ini
            $html = view('desain_pdf.absen', [
                'data' => $attendance,
                'month' => $monthKey,
                'letterheads' => $header,
                'datadiri' => $datadiri,
                'qrCodeImage' => $qrCodeImage,
                'year' => $request->input('year'),
                'month' => $request->input('month')
            ])->render();

            // Tambahkan HTML ke dokumen gabungan
            $combinedHtml .= $html;

            // Bersihkan memori
            unset($html, $signature, $qrCode, $qrCodeImage, $attendance);
        }

        // Render HTML gabungan menjadi PDF
        $dompdf->loadHtml($combinedHtml);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Nama file PDF
        $year = $request->input('year');
        $month = $request->input('month');
        $monthName = \Carbon\Carbon::createFromFormat('m', $month)->format('F');
        $userName = auth()->user()->name;
        $fileName = "Absen_{$userName}_{$year}_{$monthName}.pdf";

        // Kembalikan file PDF untuk diunduh
        return response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => "attachment; filename=\"{$fileName}\""
        ]);
    }

    public function attendanceOnline(Request $request): View
    {
        $attends = $this->attendance->count('masuk');
        $permissionCount = $this->attendance->count('izin');
        $sick = $this->attendance->count('sakit');
        $absent = $this->attendance->count('alpha');
        $permissions = $sick + $permissionCount;
        $total = $attends + $permissionCount + $sick + $absent;
        $attendances = $this->attendance->getAttendanceByStudent($request);

        $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));
        $now = Carbon::now()->format('H:i:s');
        $isWeekend = Carbon::now()->isWeekend();
        $checkin_ends = null;
        $checkout_ends = null;
        if (!$isWeekend) {
            $checkin_ends = Carbon::parse($ruleToday->checkin_ends)->addMinutes(15)->format('H:i:s');
            $checkout_ends = Carbon::parse($ruleToday->checkout_ends)->addMinutes(15)->format('H:i:s');
        }
        return view('student_online.absensi.index', compact('attends', 'permissions', 'absent', 'total', 'attendances', 'ruleToday', 'now', 'checkin_ends', 'checkout_ends', 'isWeekend'));
    }
}
