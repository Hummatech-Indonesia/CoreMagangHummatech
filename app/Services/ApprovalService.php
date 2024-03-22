<?php

namespace App\Services;

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
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Models\Limits;

class ApprovalService
{
    private ResponseLetterInterface $responseLetter;
    private UserInterface $user;
    private StudentInterface $student;
    private LimitInterface $limits;

    public function __construct(ResponseLetterInterface $responseLetter, UserInterface $user, LimitInterface $limits, StudentInterface $student)
    {
        $this->responseLetter = $responseLetter;
        $this->user = $user;
        $this->limits = $limits;
        $this->student = $student;
    }

    public function accept(AcceptedAprovalRequest $request, Student $student)
    {
        $data = $request->validated();
        if ($student->internship_type == InternshipTypeEnum::OFFLINE->value) {
            $studentcount = $this->student->countStudentOffline();
            if (!empty($this->limits->first())) {
                $limit =  $this->limits->first()->limits;
                if ($studentcount >= $limit) {
                    return $data = ['status' => StudentStatusEnum::PENDING->value];
                }
            }
        }

        $start_date_formated = \carbon\Carbon::createFromDate($student->start_date)->locale('id')->isoFormat('D MMMM Y');
        $finish_date_formated = \carbon\Carbon::createFromDate($student->finish_date)->locale('id')->isoFormat('D MMMM Y');

        //Get Data For Response Letter && mail
        $data = [
            'email' => $student->email,
            'name' => $student->name,
            'letter_number' => $data['letter_number'],
            'start_date' => $start_date_formated,
            'date' => Carbon::now()->locale('id')->isoFormat('D MMMM Y'),
            'finish_date' => $finish_date_formated,
            'school' => $student->school,
            'identify_number' => $student->identify_number,
            'school_address' => $student->school_address,
            'school_phone' => $student->school_phone,
        ];
        $view = view('desain_pdf.pendaftaran', ['data' => $data]);
        $html = $view->render();
        $pdf = Pdf::loadHTML($html);
        $generatedPdfName = 'pdf_Terima_' . time() . '.pdf';
        $pdfPath = 'public/' . TypeEnum::RESPONSELETTER->value . '/' . $generatedPdfName;
        Storage::put($pdfPath, $pdf->output());
        //Data For store
        $dataForResponseLetter = [
            'student_id' => $student->id,
            'letter_number' => $data['letter_number'] . '/PKL/HMTI/' . Carbon::now()->format('Y'),
            'letter_file' => $generatedPdfName
        ];

        $this->responseLetter->store($dataForResponseLetter);


        //Send Email To student
        Mail::send(['html' => 'mail.accept'], ['data' => $data], function ($message) use ($data, $pdf) {
            $message->to($data['email'])
                ->subject('Komfirmasi Pendaftran')
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
        //Data For Update Status Students
        $data = ['status' => StudentStatusEnum::ACCEPTED->value];

        return $data;
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
