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
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function __construct(AttendanceInterface $attendanceInterface, StudentInterface $studentInterface, MaxLateInterface $maxLateInterface, WorkFromHomeInterface $workFromHomeInterface, AttendanceDetailInterface $attendanceDetailInterface, AttendanceRuleInterface $attendanceRuleInterface, AdminAttendanceInterface $adminAttendance)
    {
        $this->attendanceRule = $attendanceRuleInterface;
        $this->maxLate = $maxLateInterface;
        $this->attendanceDetail = $attendanceDetailInterface;
        $this->workFromHome = $workFromHomeInterface;
        $this->maxLate = $maxLateInterface;
        $this->student = $studentInterface;
        $this->attendance = $attendanceInterface;
        $this->adminAttendance = $adminAttendance;
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
        $max = $this->maxLate->get();

        $attendanceData = [
            'attendance_type' => 'online',
            'student_id' => auth()->user()->student->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $attendance = $this->attendance->checkAttendanceToday([
            'student_id' => auth()->user()->student->id,
            'created_at' => now()->startOfDay(),
        ]);

        $day = Carbon::now()->format('l');
        $ruleToday = $this->attendanceRule->getByDay($day);
        // dd($day, $ruleToday);

        $attendanceDetail = $this->attendanceDetail->getByAttendanceAndStatus($attendance->id, ['present', 'return']);

        if ($attendanceDetail->where('created_at', '>=', now()->startOfDay())->count() > 0) {
            return back()->with('error', 'Anda sudah melakukan absen hari ini');
        }

        if (!$ruleToday) {
            return back()->with('error', 'Tidak ada jam absen hari ini');
        }
        if (!$attendance = $this->attendance->checkAttendanceToday(['student_id' => auth()->user()->student->id, 'created_at' => now()])) {
            $attendance = $this->attendance->store($attendanceData);
        }

        $checkinStarts = Carbon::parse($ruleToday->checkin_starts)->format('H:i:s');
        $checkinEnds = Carbon::parse($ruleToday->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s');
        $checkoutStarts = Carbon::parse($ruleToday->checkout_starts)->format('H:i:s');
        $checkoutEnds = Carbon::parse($ruleToday->checkout_ends)->format('H:i:s');

        // dd([
        //     'current_time' => $time,
        //     'checkin_starts' => $ruleToday->checkin_starts,
        //     'checkin_ends' => Carbon::createFromFormat('H:i:s', $ruleToday->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s'),
        //     'checkout_starts' => $ruleToday->checkout_starts,
        //     'checkout_ends' => $ruleToday->checkout_ends,
        // ]);


        if ($time >= $checkinStarts && $time <= $checkinEnds) {
            $this->attendanceDetail->storeOnline(['status' => 'present', 'attendance_id' => $attendance->id, 'updated_at' => now()]);
        } else if ($time >= $checkoutStarts && $time <= $checkoutEnds) {
            $this->attendanceDetail->storeOnline(['status' => 'return', 'attendance_id' => $attendance->id, 'updated_at' => now()]);
        } else {
            return back()->with('error', "Tidak ada jam. Waktu sekarang: $time, checkin: $checkinStarts - $checkinEnds, checkout: $checkoutStarts - $checkoutEnds");
        }


        return redirect()->back()->with('success', "Berhasil absen");
    }


    // public function absentOnline(): RedirectResponse
    // {
    //     $time = now()->format('H:i:s');
    //     $max = $this->maxLate->get();

    //     $attendanceData = [
    //         'attendance_type' => 'online',
    //         'student_id' => auth()->user()->student->id,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ];

    //     $attendance = $this->attendance->checkAttendanceToday([
    //         'student_id' => auth()->user()->student->id,
    //         'created_at' => now()->startOfDay(),
    //     ]);

    //     $ruleToday = $this->attendanceRule->getByDay(Carbon::now()->format('l'));

    //     if (!$ruleToday) {
    //         return back()->with('error', 'Tidak ada jam absen hari ini');
    //     }

    //     if (!$attendance) {
    //         $attendance = $this->attendance->store($attendanceData);
    //     }

    //     $attendanceDetail = $this->attendanceDetail->getByAttendanceAndStatus($attendance->id, ['present', 'return']);

    //     if ($attendanceDetail->where('created_at', '>=', now()->startOfDay())->count() > 0) {
    //         return back()->with('error', 'Anda sudah melakukan absen hari ini');
    //     }

    //     if ($time >= $ruleToday->checkin_starts && $time <= Carbon::createFromFormat('H:i:s', $ruleToday->checkin_ends)->addMinutes($max ? (int) $max->minute : 15)->format('H:i:s')) {
    //         $this->attendanceDetail->store([
    //             'status' => 'present',
    //             'attendance_id' => $attendance->id,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     } else if ($time >= $ruleToday->checkout_starts && $time <= $ruleToday->checkout_ends) {
    //         $this->attendanceDetail->store([
    //             'status' => 'return',
    //             'attendance_id' => $attendance->id,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return redirect()->back()->with('success', "Berhasil absen");
    // }


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
                'attendance_type' => 'offline',
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


        $years = $attendances->pluck('created_at')->map(function ($date) {
            return $date->format('Y');
        })->unique()->sort()->values();

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

//        dd($months);

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
        $onlineAttendances = $this->student->listAttendance($request);
        return view('student_online.absensi.index', compact('onlineAttendances'));
    }
}
