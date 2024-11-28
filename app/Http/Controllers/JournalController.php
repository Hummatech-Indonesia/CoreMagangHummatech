<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Journal;
use App\Services\JournalService;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\SignatureInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\DataAdmin;
use App\Models\Letterhead;
use App\Models\Signature;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    private JournalInterface $journal;
    private JournalService $service;
    private DataAdminInterface $dataadmin;
    private SignatureInterface $signature;
    private LetterheadsInterface $letterheads;
    private StudentInterface $student;

    public function __construct(JournalInterface $journal, JournalService $service, DataAdminInterface $dataadmin, SignatureInterface $signature, StudentInterface $student, LetterheadsInterface $letterheads)
    {
        $this->journal = $journal;
        $this->student = $student;
        $this->dataadmin = $dataadmin;
        $this->service = $service;
        $this->letterheads = $letterheads;
        $this->signature = $signature;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = $this->journal->get();

        $years = $journals->pluck('created_at')->map(function ($date) {
            return $date->format('Y');
        })->unique()->sort()->values();

        $months = $journals->pluck('created_at')->map(function ($date) {
            return $date->format('m');
        })->unique()->sort()->values();

        $year = request()->get('year', $years->first());
        $month = request()->get('month', $months->first());

        return view('student_offline.journal.index', compact('journals', 'years', 'months', 'year', 'month'));
    }


    public function getjournals()
    {
        $journals = $this->journal->getjournal();
        return view('admin.page.journal', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJournalRequest $request)
    {
        try {
            $currentDate = Carbon::now()->locale('id_ID')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            if ($currentDate < '16:00:00' || $currentDate > '23:59:00') {
                return redirect()->back()->with('error', 'Waktu pengumpulan adalah jam 4 sore sampai 12 malam');
            } else {
                $existingData = $this->journal->where('created_at', '>=', now()->startOfDay());
                if ($existingData) {
                    return redirect()->back()->with('error', 'Anda Telah Mengisi Jurnal Hari ini.');
                }

                if (now()->isWeekend()) {
                    return redirect()->back()->with('error', 'Hari ini adalah hari libur.');
                }
                $data = $this->service->store($request);
                $this->journal->store($data);
                return redirect()->back()->with('success', 'Jurnal Berhasil Ditambahkan');
            }
        } catch (\Throwable $th) {
            return back()->with('warning', 'Gagal Mengisi Jurnal, ' . $th->getMessage());
        }
    }

    /**f
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        // $journals = $this->journal->get();
        // return view('admin.page.journal', compact('journals'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        $data = $this->service->update($journal, $request);
        $this->journal->update($journal->id, $data);
        return back()->with('success', 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $this->service->delete($journal);
        $this->journal->delete($journal->id);
        return back()->with('success', 'Berhasi Menghapus Data');
    }

    public function studentOnline()
    {
        $journals = $this->journal->get();
        return view('student_online.journal.index', compact('journals'));
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
        Journal::where('student_id', auth()->user()->student->id)
            ->whereYear('created_at', $request->input('year'))
            ->whereMonth('created_at', $request->input('month'))
            ->chunk(100, function ($jurnals) use (&$months) {
                foreach ($jurnals as $journal) {
                    $monthKey = \Carbon\Carbon::parse($journal->created_at)->format('Y-m');
                    $months[$monthKey][] = $journal;
                }
            });

        $header = Letterhead::where('user_id', auth()->user()->id)->first();
        $datadiri = Student::where('id', auth()->user()->student->id)->first();

        // Cek kop surat
        if (!$header) {
            return redirect()->back()->with('warning', 'Harap mengisi kop surat terlebih dahulu');
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
        foreach ($months as $monthKey => $jurnals) {
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
            $html = view('desain_pdf.jurnal', [
                'data' => $jurnals,
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
            unset($html, $signature, $qrCode, $qrCodeImage, $jurnals);
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
        $fileName = "Jurnal_{$userName}_{$year}_{$monthName}.pdf";

        // Kembalikan file PDF untuk diunduh
        return response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\""
        ]);
    }
}
