<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class DivisionPlacementController extends Controller
{
    private StudentInterface $student;
    private DivisionInterface $division;
    private MentorStudentInterface $mentorStudent;

    /**
     * Create a new controller instance.
     */
    public function __construct(StudentInterface $student, DivisionInterface $division, MentorStudentInterface $mentorStudent)
    {
        $this->student = $student;
        $this->mentorStudent = $mentorStudent;
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

    public function divisionchange( UpdateStudentRequest $request, Student $student)
    {
        $this->student->update($student->id, ['division_id' => $request->division_id]);
        return redirect()->back()->with(['success' => 'Divisi Berhasil Di ganti']);
    }
}
