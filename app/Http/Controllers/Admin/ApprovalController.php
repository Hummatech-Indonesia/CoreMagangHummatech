<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Http\Requests\DeclinedAprovalRequest;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\LimitInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Services\ApprovalService;
use App\Services\StudentService;

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

    public function index()
    {
        $studentOffline = $this->approval->ListStudentOffline();
        $studentOnline = $this->approval->ListStudentOnline();
        $limits = $this->limit->first();
        return view('admin.page.approval.index', compact('limits', 'studentOffline', 'studentOnline'));
    }


    public function accept(AcceptedAprovalRequest $request, Student $student)
    {

        $data = $this->service->accept($request, $student);
        $this->approval->update($student->id, $data);
        return back()->with('success', 'Berhasil Menerima Siswa Baru');
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
