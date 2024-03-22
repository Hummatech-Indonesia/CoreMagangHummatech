<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class DivisionPlacementController extends Controller
{
    private StudentInterface $student;
    private DivisionInterface $division;

    /**
     * Create a new controller instance.
     */
    public function __construct(StudentInterface $student, DivisionInterface $division)
    {
        $this->student = $student;
        $this->division = $division;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentOfflines = $this->student->listStudentOffline();
        $divisions = $this->division->get();
        return view('admin.page.offline-students.division-placement', compact('studentOfflines', 'divisions'));
    }

    public function divisionchange( UpdateStudentRequest $request, Student $student)
    {
        $this->student->update($student->id, ['division_id' => $request->division_id]);
        return redirect()->back()->with(['success' => 'Divisi Berhasil Di ganti']);
    }
}
