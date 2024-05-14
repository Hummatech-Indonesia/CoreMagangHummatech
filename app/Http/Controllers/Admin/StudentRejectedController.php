<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\LimitInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Enum\StudentStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptedAprovalRequest;
use App\Models\Student;
use App\Services\ApprovalService;
use App\Services\StudentRejectService;
use Illuminate\Http\Request;

class StudentRejectedController extends Controller
{
    private StudentInterface $student;
    private LimitInterface $limit;
    private StudentRejectService $service;

    public function __construct(StudentInterface $student, LimitInterface $limit, StudentRejectService $service)
    {
        $this->student = $student;
        $this->limit = $limit;
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $studentRejecteds = $this->student->getstudentdeclined($request);

        return view('admin.page.user.students-rejected', compact('studentRejecteds'));
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
        $this->student->update($student->id, $data);
        return back()->with('success', 'Berhasil Menerima Siswa Baru');
    }
}
