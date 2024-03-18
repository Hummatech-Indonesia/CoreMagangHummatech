<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Http\Requests\DeclinedAprovalRequest;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Services\ApprovalService;

class ApprovalController extends Controller
{
    private ApprovalInterface $approval;
    private StudentInterface $student;
    private ApprovalService $service;
    public function __construct(ApprovalInterface $approval, StudentInterface $student, ApprovalService $service)
    {
        $this->approval = $approval;
        $this->student = $student;
        $this->service = $service;
    }
    public function index()
    {
        $students = $this->approval->where();
        return view('admin.page.approval.index' , compact('students'));
    }


    public function accept( AcceptedAprovalRequest $request,Student $student)
    {
        $data = $this->service->accept($request, $student);
        $this->student->update($student->id, $data);

        return back()->with('success', 'Berhasil Menerima Siswa Baru');
    }

    public function decline(DeclinedAprovalRequest $request,Student $student)
    {
        $data = $this->service->decline($request, $student);
        $this->student->update($student->id, $data);
        return back()->with('success', 'Berhasil Menolak Siswa Baru');
    }

    public function delete(Student $student)
    {
        $this->delete($student->id);
    }
}
