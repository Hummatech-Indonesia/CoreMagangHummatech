<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRejectedController extends Controller
{
    private StudentInterface $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $studentBanneds = $this->student->getstudentbanned();

        return view('admin.page.user.students-rejected', compact('studentBanneds'));
    }
}
