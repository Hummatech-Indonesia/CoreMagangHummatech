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


    public function accept(Student $student)
    {
        $data = ['status' => 'accepted'];
        $this->student->update($student->id, $data);

        return back()->with('success', 'Berhasil Menerima Siswa Baru');
    }

    public function decline(Student $student)
    {
        $data = ['status' => 'declined'];
        $this->student->update($student->id, $data);
        return back()->with('success', 'Berhasil Menolak Siswa Baru');
    }

    public function delete(Student $student)
    {
        $this->delete($student->id);
    }
}
