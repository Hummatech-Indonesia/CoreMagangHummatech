<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Http\Requests\DeclinedAprovalRequest;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\StudentInterface;

class ApprovalController extends Controller
{
    private ApprovalInterface $approval;
    private StudentInterface $student;
    public function __construct(ApprovalInterface $approval, StudentInterface $student)
    {
        $this->approval = $approval;
        $this->student = $student;
    }
    public function index()
    {
        $students = $this->approval->where();
        return view('admin.page.approval.index' , compact('students'));
    }

    public function show(Student $student)
    {
        $students = $this->approval->where();

        return view('admin.page.approval.detail' , compact('students'));
    }

    public function accept(Student $student,AcceptedAprovalRequest $request)
    {
        $this->student->update($student->id, $request->validate());
    }

    public function decline(Student $student,DeclinedAprovalRequest $request)
    {
        $this->student->update($student->id, $request->validated());
    }
}
