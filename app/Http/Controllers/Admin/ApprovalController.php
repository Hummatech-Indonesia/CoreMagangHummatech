<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Enum\StudentStatusEnum;
use App\Enum\InternshipTypeEnum;
use App\Services\StudentService;
use App\Services\ApprovalService;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\LimitInterface;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Http\Requests\DeclinedAprovalRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Models\ResponseLetter;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    private ApprovalInterface $approval;
    private StudentInterface $student;
    private StudentService $servicestudent;
    private ApprovalService $service;
    private LimitInterface $limit;
    public function __construct(ApprovalInterface $approval, StudentInterface $student, ApprovalService $service, StudentService $servicestudent, LimitInterface $limit)
    {
        $this->approval = $approval;
        $this->student = $student;
        $this->service = $service;
        $this->limit = $limit;
        $this->servicestudent = $servicestudent;
    }

    public function index(Request $request)
    {
        $studentOffline = $this->approval->ListStudentOffline($request);
        $studentOnline = $this->approval->ListStudentOnline($request);
        $limits = $this->limit->first();
        $studentcount = $this->student->countStudentOffline();
        $limit = $this->limit->first() ? $this->limit->first()->limits : 0;
        $countLimits =   max(0, $limit - $studentcount);

        return view('admin.page.approval.index', compact('limits', 'studentOffline', 'studentOnline','countLimits'));
    }


    public function accept(AcceptedAprovalRequest $request, Student $student)
    {
        if ($student->internship_type == InternshipTypeEnum::OFFLINE->value) {
            $studentcount = $this->student->countStudentOffline();
            if (!empty($this->limit->first())) {
                $limit =  $this->limit->first()->limits;
                if ($studentcount >= $limit) {
                    return back()->with('error', 'Limit Sudah Penuh');
                }
            }
        }
        $data = $this->service->accept($request, $student);
        $this->approval->update($student->id, $data);
        return back()->with('success', 'Berhasil Menerima Siswa Baru');
    }

    public function acceptMultiple(Request $request)
    {

        $selectedIds = explode(',', $request->input('selected_ids'));
        $letterNumbers = $request->input('letter_numbers');

        $groupedData = [];
        foreach ($selectedIds as $studentId) {
            $student = Student::find($studentId);
            if ($student) {
                $school = $student->school;
                $groupedData[$school]['letter_number'] = $letterNumbers[$school];
                $groupedData[$school]['student_ids'][] = $studentId;
            }
        }

        $this->service->acceptMultiple($groupedData);

        return back()->with('success', 'Berhasil menerima Siswa Baru');
    }






    public function decline(DeclinedAprovalRequest $request, Student $student)
    {
        $data = $this->service->decline($request, $student);
        $this->student->update($student->id, $data);
        return back()->with('success', 'Berhasil Menolak Siswa Baru');
    }

    public function destroy(Student $student)
    {
        $this->servicestudent->delete($student);
        $this->student->delete($student->id);
        return back()->with('success', 'Berhasil Menghapus Siswa Baru');
    }
}
