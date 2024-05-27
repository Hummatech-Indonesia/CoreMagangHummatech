<?php

namespace App\Services;

use App\Contracts\Interfaces\DataCOInterface;
use App\Contracts\Interfaces\LimitInterface;
use Carbon\Carbon;
use App\Enum\TypeEnum;
use App\Enum\RolesEnum;
use App\Models\Student;
use App\Mail\DeclineApproval;
use App\Enum\StudentStatusEnum;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Http\Requests\DeclinedAprovalRequest;
use App\Contracts\Interfaces\ResponseLetterInterface;
use App\Contracts\Interfaces\Signature_COInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Models\Limits;
use App\Models\ResponseLetter;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApprovalService
{
    private ResponseLetterInterface $responseLetter;
    private UserInterface $user;
    private StudentInterface $student;
    private DataCOInterface $dataCO;
    private Signature_COInterface $signature_CO;
    private LimitInterface $limits;

    public function __construct(ResponseLetterInterface $responseLetter, UserInterface $user, LimitInterface $limits, StudentInterface $student ,DataCOInterface $dataCO ,Signature_COInterface $signature_CO)
    {
        $this->responseLetter = $responseLetter;
        $this->user = $user;
        $this->signature_CO = $signature_CO;
        $this->dataCO = $dataCO;
        $this->limits = $limits;
        $this->student = $student;
    }

    public function accept(AcceptedAprovalRequest $request, Student $student)
    {
        $data = $request->validated();
        $start_date_formatted = Carbon::createFromDate($student->start_date)->locale('id')->isoFormat('D MMMM Y');
        $finish_date_formatted = Carbon::createFromDate($student->finish_date)->locale('id')->isoFormat('D MMMM Y');
        $months = collect([$data])->groupBy(function ($item) {
            return Carbon::now()->format('Y-m');
        });

        // qr
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        $combinedHtml = '';

        $dataadmin = $this->dataCO->get();
        foreach ($months as $month => $attendances) {
            $data_CO = [
                'barcode' => '',
                'data_c_o_s_id' => $dataadmin->id
            ];
            $signature = $this->signature_CO->store($data_CO);

            $qrCode = QrCode::size(100)->generate(url('/hummatech/' . $signature->id));
            $qrCodeImage = 'data:image/png;base64,' . base64_encode($qrCode);

            $signature->barcode = $qrCodeImage;
            $signature->save();
        }

        $dompdf->loadHtml($combinedHtml);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="absensi.pdf"'
        ];

        $studentsData[] = [
            'name' => $student->name,
            'identify_number' => $student->identify_number
        ];

        // end qr
        $data = [
            'email' => $student->email,
            'name' => $student->name,
            'letter_number' => $data['letter_number'],
            'start_date' => $start_date_formatted,
            'date' => Carbon::now()->locale('id')->isoFormat('D MMMM Y'),
            'finish_date' => $finish_date_formatted,
            'school' => $student->school,
            'identify_number' => $student->identify_number,
            'school_address' => $student->school_address,
            'school_phone' => $student->school_phone,
        ];

        $directorName = $dataadmin->name;
        $directorField = $dataadmin->field;

        $view = view('desain_pdf.pendaftaran', compact('data', 'qrCodeImage', 'studentsData', 'directorName', 'directorField'));
        $html = $view->render();
        $pdf = Pdf::loadHTML($html);
        $generatedPdfName = 'pdf_Terima_' . time() . '.pdf';
        $pdfPath = 'public/' . TypeEnum::RESPONSELETTER->value . '/' . $generatedPdfName;
        Storage::put($pdfPath, $pdf->output());

        // Data For store
        $dataForResponseLetter = [
            'student_id' => $student->id,
            'letter_number' => $data['letter_number'] . '/PKL/HMTI/' . Carbon::now()->format('Y'),
            'letter_file' => $generatedPdfName
        ];
        $this->responseLetter->store($dataForResponseLetter);

        // Send Email To student
        Mail::send(['html' => 'mail.accept'], ['data' => $data], function ($message) use ($data, $pdf) {
            $message->to($data['email'])
                ->subject('Konfirmasi Pendaftaran')
                ->attachData($pdf->output(), "Konfirmasi.pdf");
        });

        $dataUser = [
            'name' => $student->name,
            'email' => $student->email,
            'password' => $student->password,
            'student_id' => $student->id,
        ];
        $user = $this->user->store($dataUser);

        if ($student->internship_type == InternshipTypeEnum::OFFLINE->value) {
            $user->assignRole(RolesEnum::OFFLINE->value);
        } elseif ($student->internship_type == InternshipTypeEnum::ONLINE->value) {
            $user->assignRole(RolesEnum::ONLINE->value);
        }

        // Data For Update Status Students
        $data = ['status' => StudentStatusEnum::ACCEPTED->value];

        // Return the response
        return $data;
    }

    public function acceptMultiple(array $groupedData): void
    {
        foreach ($groupedData as $school => $data) {
            $letterNumber = $data['letter_number'];
            $studentIds = $data['student_ids'];

            $studentsData = [];

            foreach ($studentIds as $studentId) {
                $student = Student::findOrFail($studentId);

                $start_date_formatted = Carbon::createFromDate($student->start_date)->locale('id')->isoFormat('D MMMM Y');
                $finish_date_formatted = Carbon::createFromDate($student->finish_date)->locale('id')->isoFormat('D MMMM Y');

                $dataadmin = $this->dataCO->get();
                $data_CO = [
                    'barcode' => '',
                    'data_c_o_s_id' => $dataadmin->id
                ];
                $signature = $this->signature_CO->store($data_CO);

                $qrCode = QrCode::size(100)->generate(url('/hummatech/' . $signature->id));
                $qrCodeImage = 'data:image/png;base64,' . base64_encode($qrCode);

                $signature->barcode = $qrCodeImage;
                $signature->save();

                // Tambahkan data siswa ke dalam array $studentsData
                $studentsData[] = [
                    'name' => $student->name,
                    'identify_number' => $student->identify_number
                ];

                // Generate PDF dan kirim email untuk semua siswa setelah loop
                $data = [
                    'letter_number' => $letterNumber,
                    'start_date' => $start_date_formatted,
                    'date' => Carbon::now()->locale('id')->isoFormat('D MMMM Y'),
                    'finish_date' => $finish_date_formatted,
                    'school' => $student->school,
                    'school_address' => $student->school_address,
                    'school_phone' => $student->school_phone,
                ];
            }

            // Ambil nama dan field dari data_co
            $directorName = $dataadmin->name;
            $directorField = $dataadmin->field;

            $view = view('desain_pdf.pendaftaran', compact('data', 'qrCodeImage', 'studentsData', 'directorName', 'directorField'));
            $html = $view->render();
            $pdf = Pdf::loadHTML($html);
            $generatedPdfName = 'pdf_Terima_' . time() . '.pdf';
            $pdfPath = 'public/' . TypeEnum::RESPONSELETTER->value . '/' . $generatedPdfName;
            Storage::put($pdfPath, $pdf->output());

            // Simpan data untuk setiap siswa
            foreach ($studentIds as $studentId) {
                $student = Student::findOrFail($studentId);

                $dataForResponseLetter = [
                    'student_id' => $student->id,
                    'letter_number' => $letterNumber . '/PKL/HMTI/' . Carbon::now()->format('Y'),
                    'letter_file' => $generatedPdfName
                ];
                $this->responseLetter->store($dataForResponseLetter);

                // Kirim email ke setiap siswa
                $data['email'] = $student->email;
                $data['name'] = $student->name;
                Mail::send(['html' => 'mail.accept'], ['data' => $data], function ($message) use ($data, $pdf) {
                    $message->to($data['email'])
                        ->subject('Konfirmasi Pendaftaran')
                        ->attachData($pdf->output(), "Konfirmasi.pdf");
                });

                // Buat user untuk setiap siswa
                $dataUser = [
                    'name' => $student->name,
                    'email' => $student->email,
                    'password' => $student->password,
                    'student_id' => $student->id,
                ];
                $user = $this->user->store($dataUser);

                // Assign role berdasarkan jenis PKL
                if ($student->internship_type == InternshipTypeEnum::OFFLINE->value) {
                    $user->assignRole(RolesEnum::OFFLINE->value);
                } elseif ($student->internship_type == InternshipTypeEnum::ONLINE->value) {
                    $user->assignRole(RolesEnum::ONLINE->value);
                }

                // Update status siswa
                $student->update(['status' => StudentStatusEnum::ACCEPTED->value]);
            }
        }
    }




    public function decline(DeclinedAprovalRequest $request, Student $student)
    {
        $data = $request->validated();
        $mailData = [
            'content' => $student->name,
            'email' => $student->email
        ];
        Mail::to($mailData['email'])->send(new DeclineApproval($mailData));
        $data = ['status' => StudentStatusEnum::DECLINED->value];
        return $data;
    }
}
