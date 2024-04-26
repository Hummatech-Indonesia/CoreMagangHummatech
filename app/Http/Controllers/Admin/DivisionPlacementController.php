<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class DivisionPlacementController extends Controller
{
    private StudentInterface $student;
    private DivisionInterface $division;
    private MentorDivisionInterface $mentorDivision;
    private MentorStudentInterface $mentorStudent;

    /**
     * Create a new controller instance.
     */
    public function __construct(StudentInterface $student, DivisionInterface $division, MentorStudentInterface $mentorStudent, MentorDivisionInterface $mentorDivision)
    {
        $this->student = $student;
        $this->mentorStudent = $mentorStudent;
        $this->mentorDivision = $mentorDivision;
        $this->division = $division;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentid = $this->student->pluck('id')->toArray();
        $studentOfflines = $this->student->getstudentdivisionplacement();
        $students = $this->student->getstudentdivisionplacementedit();
        $divisions = $this->division->get();
        return view('admin.page.offline-students.division-placement', compact('studentOfflines', 'divisions', 'students'));
    }

    public function divisionplacement( UpdateStudentRequest $request, Student $student)
    {
        $mentorDivisions = $this->mentorDivision->whereMentorDivision($request->division_id);
        foreach ($mentorDivisions as $mentor) {
            $data['student_id'] = $student->id;
            $data['mentor_id'] = $mentor->id;
            $this->mentorStudent->store($data);
        }
        
        $this->student->update($student->id, ['division_id' => $request->division_id]);
        return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
    }

    public function divisionchange( UpdateStudentRequest $request, Student $student)
    {
        $mentorDivisions = $this->mentorDivision->whereMentorDivision($request->division_id);
        foreach ($mentorDivisions as $mentor) {
            $data['student_id'] = $student->id;
            $data['mentor_id'] = $mentor->id;
            $this->mentorStudent->update($student->id, $data);
        }
        
        $this->student->update($student->id, ['division_id' => $request->division_id]);
        return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
    }
}
