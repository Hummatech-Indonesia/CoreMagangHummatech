<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorPlacementController extends Controller
{
    private StudentInterface $student;
    private MentorStudentInterface $mentorStudent;
    private MentorInterface $mentor;

    public function __construct( StudentInterface $student, MentorStudentInterface $mentorStudent, MentorInterface $mentor)
    {
        $this->student = $student;
        $this->mentorStudent = $mentorStudent;
        $this->mentor = $mentor;
    }
    /**
     *
     */
    public function index()
    {
        $studentid = $this->mentorStudent->pluck('student_id')->toArray();
        $students = $this->student->getstudentmentorplacement($studentid);
        $mentors = $this->mentor->get();
        return view('admin.page.online-students.mentor-placement', compact('students', 'mentors'));
    }
}
