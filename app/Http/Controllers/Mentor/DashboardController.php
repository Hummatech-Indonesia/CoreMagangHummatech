<?php

namespace App\Http\Controllers\Mentor;

use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\MentorStudent;
use App\Services\StudentService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DivisionInterface $division;
    private MentorInterface $mentor;
    private StudentInterface $student;
    private StudentService $studentService;
    private MentorStudentInterface $mentorStudent;
    private MentorDivisionInterface $mentorDivision;

    public function __construct(DivisionInterface $division, MentorInterface $mentor, StudentInterface $student, StudentService $studentService, MentorStudentInterface $mentorStudent, MentorDivisionInterface $mentorDivision)
    {
        $this->division = $division;
        $this->mentor = $mentor;
        $this->student = $student;
        $this->studentService = $studentService;
        $this->mentorStudent = $mentorStudent;
        $this->mentorDivision = $mentorDivision;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $division = $this->division->get();
        $mentor = $this->mentor->get();
        $mentorStudent = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $mentorDivision = $this->mentorDivision->get();
        $check_id = $this->mentorStudent->pluck('student_id');

        return view('mentor.index',compact('division','mentor', 'mentorStudent','mentorDivision'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
