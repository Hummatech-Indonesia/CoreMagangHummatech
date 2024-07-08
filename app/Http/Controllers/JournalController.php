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
        return view('student_offline.journal.index', compact('journals'));
    }



    public function getjournals()
    {
        $journals = $this->journal->getjournal();
        return view('admin.page.journal' , compact('journals'));
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

    public function downloadPDF()
    {
        set_time_limit(0);
        $data = Journal::where('student_id', auth()->user()->student->id)->get();
        $header = Letterhead::where('user_id', auth()->user()->id)->first();
        $datadiri = Student::where('id', auth()->user()->student->id)->first();

        $months = $data->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->tanggal)->format('Y-m');
        });

        if($header == null) {
            return redirect()->back()->with('warning', 'Harap mengisi kop surat terlebih dahulu');
        } else {

            $dompdf = new Dompdf();
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('isRemoteEnabled', true);
            $dompdf->setOptions($options);


            $combinedHtml = '';
            $dataadmin = DataAdmin::query()->first();
            // Loop through months and append HTML to the combined HTML string
            foreach ($months as $month => $jurnals) {
                $signature = Signature::create([
                    'qr' => '', // Placeholder untuk QR code, akan diperbarui nanti
                    'data_admin_id' => $dataadmin->id
                ]);

                $qrCode = QrCode::size(100)->generate(url('/data-qr/' . $signature->id)); // Mengarahkan ke ID signature yang baru saja dibuat
                $qrCodeImage = 'data:image/png;base64,' . base64_encode($qrCode);

                $signature->qr = $qrCodeImage; // Memperbarui kolom qr dengan QR code yang baru dibuat
                $signature->save();

                $html = view('desain_pdf.jurnal', [
                    'data' => $jurnals,
                    'months' => $month,
                    'letterheads' => $header,
                    'datadiri' => $datadiri,
                    'qrCodeImage' => $qrCodeImage
                ])->render();
                $combinedHtml .= $html;
            }

            $dompdf->loadHtml($combinedHtml);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $output = $dompdf->output();

            // Set header for PDF download
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="jurnal.pdf"'
            ];

            return response($output, 200, $headers);

        }

        // try {
        //     //code...
        //     set_time_limit(0);

        //     $journals = $this->journal->get();
        //     $header = $this->letterheads->whereauth(auth()->user()->id);
        //     $datastudent = $this->student->first();

        //     $months = $journals->groupBy(function ($date) {
        //         return \Carbon\Carbon::parse($date->created_at)->format('Y-m');
        //     });
        //     $dompdf = new Dompdf();
        //     $options = new Options();
        //     $options->set('isHtml5ParserEnabled', true);
        //     $options->set('isPhpEnabled', true);
        //     $options->set('isRemoteEnabled', true);
        //     $dompdf->setOptions($options);

        //     $combinedHtml = '';
        //     $dataadmin = $this->dataadmin->get();
        //     // Loop through months and append HTML to the combined HTML string
        //     foreach ($months as $month => $jurnals) {
        //         $signature = $this->signature->store([
        //             'qr' => '', // Placeholder untuk QR code, akan diperbarui nanti
        //             'data_admin_id' => $dataadmin->id
        //         ]);

        //         $qrCode = QrCode::size(100)->generate(url('/data-qr/' . $signature->id)); // Mengarahkan ke ID signature yang baru saja dibuat
        //         $qrCodeImage = 'data:image/png;base64,' . base64_encode($qrCode);

        //         $signature->qr = $qrCodeImage; // Memperbarui kolom qr dengan QR code yang baru dibuat
        //         $signature->save();

        //         $html = view('desain_pdf.jurnal', [
        //             'data' => $jurnals,
        //             'months' => $month,
        //             'letterheads' => $header,
        //             'datadiri' => $datastudent,
        //             'qrCodeImage' => $qrCodeImage
        //         ])->render();
        //         $combinedHtml .= $html;
        //     }

        //     // Debug: Simpan HTML ke file untuk pemeriksaan
        //     file_put_contents(public_path('output.html'), $combinedHtml);

        //     // Load HTML ke DOMPDF dan render ke PDF
        //     $dompdf->loadHtml($combinedHtml);
        //     $dompdf->setPaper('A4', 'portrait');
        //     $dompdf->render();

        //     $output = $dompdf->output();

        //     // Set header untuk download PDF
        //     $headers = [
        //         'Content-Type' => 'application/pdf',
        //         'Content-Disposition' => 'attachment; filename="jurnal.pdf"'
        //     ];

        //     return response($output, 200, $headers);
        // } catch (Exception $e) {
        //     return back()->with('error', 'Terjadi Kesalahan: ' . $e->getMessage());
        // }
    }

}
