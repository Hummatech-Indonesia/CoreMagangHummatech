<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Sale;
use App\Models\Team;
use App\Enum\TypeEnum;
use App\Models\Course;
use App\Models\Journal;
use App\Models\Product;
use App\Models\Service;
use App\Models\Student;
use App\Models\Structure;
use App\Models\WarningLetter;
use Illuminate\Support\Facades\Log;
use App\Services\Traits\UploadTrait;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStructureRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Http\Requests\UpdateStructureRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreWarning_LetterRequest;
use App\Http\Requests\UpdateWarning_LetterRequest;

class WarningLetterService
{
    use UploadTrait;

    private StudentInterface $students;

    public function __construct(StudentInterface $students)
    {
        $this->students = $students;
    }

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreWarning_LetterRequest $request, WarningLetter $warningLetter,): array|bool
    {
        $data = $request->validated();
        $student = $this->students->sp($data['student_id']);
        $dataForPdf = [
            'name' => $student->name,
            'reference_number' => $request->reference_number,
            'status' => $request->status,
            'school' => $student->school,
            'reason' => $request->reason,
            'date' => Carbon::parse($request->input('date'))->locale('id')->isoFormat('D MMMM Y'),
        ];

        $pdf = FacadePdf::loadView('desain_pdf.percobaan', ['data' => $dataForPdf]);
        $generatedPdfName = 'pdf_' . time() . '.pdf';
        $pdfPath = 'public/' . TypeEnum::WARNING_LETTER->value . '/' . $generatedPdfName;
        Storage::put($pdfPath, $pdf->output());
        $nomor_surat = $request->reference_number . "/SP/PKL/I/" . Carbon::now()->format('Y');

        $data = [
            'student_id' => $request->student_id,
            'status' => $request->status,
            'reference_number' => $nomor_surat,
            'file' => $generatedPdfName,
            'reason' => $request->reason,
            'date' => $request->date,
        ];

        $datas = [
            'nama' => $student->name,
            'sp' => $request->status,
            'alasan' => $request->reason,
            'pdf' => $generatedPdfName,
        ];
        // dd(base64_encode($datas['pdf']));
        $item['email'] = $student->email;
        $item['title'] = 'Pemberian Surat Sp';

        Mail::send(['html' => 'mail.SuratSp'], ['data' => $datas], function ($message) use ($item, $pdf) {
            $message->to($item["email"])
                ->subject($item["title"])
                ->attachData($pdf->output(), "Surat_Sp.pdf");
        });

        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(WarningLetter $warningLetter, UpdateWarning_LetterRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->remove($warningLetter->file);
            $data['file'] = $request->file('file')->store(TypeEnum::WARNING_LETTER->value, 'public');
        } else {
            $data['file'] = $warningLetter->file;
        }

        return $data;
    }

    public function delete(WarningLetter $warningLetter)
    {
        $this->remove($warningLetter->file);
    }
}
