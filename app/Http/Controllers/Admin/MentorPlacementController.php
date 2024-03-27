<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMentorStudentRequest;
use App\Models\Student;
use App\Services\MentorStudentService;
use Illuminate\Http\Request;

class MentorPlacementController extends Controller
{
    private StudentInterface $student;
    private MentorStudentInterface $mentorStudent;
    private MentorInterface $mentor;
    private MentorStudentService $mentorStudentService;
    private MentorDivisionInterface $mentordivision;

    public function __construct(StudentInterface $student, MentorStudentInterface $mentorStudent, MentorInterface $mentor, MentorStudentService $mentorStudentService, MentorDivisionInterface $mentordivision)
    {
        $this->student = $student;
        $this->mentorStudent = $mentorStudent;
        $this->mentor = $mentor;
        $this->mentorStudentService = $mentorStudentService;
        $this->mentordivision = $mentordivision;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentid = $this->mentorStudent->pluck('student_id')->toArray();
        $students = $this->student->getstudentmentorplacement($studentid);
        $mentors = collect();

        foreach ($students as $student) {
            $divisionId = $student->division_id;
            $mentors = $mentors->merge($this->mentordivision->whereMentorDivision($divisionId));
        }
        return view('admin.page.online-students.mentor-placement', compact('students', 'mentors'));
    }

    /**
     *  Updating the specified resource in storage.
     */
    public function update(UpdateMentorStudentRequest $request, Student $student)
    {
        $data = $this->mentorStudentService->update($student, $request);
        $this->mentorStudent->store($data);

        return redirect()->back()->with('success', 'Mentor Placement Updated');
    }
}
