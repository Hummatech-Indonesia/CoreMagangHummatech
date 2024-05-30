<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentInterface;
use App\Models\Mentor;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    private StudentInterface $student;
    public function __construct(StudentInterface $studentInterface)
    {
        $this->student = $studentInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     *
     * page attendance
     * @param Request
     * @return View
     *
     */
    public function indexAttendances(Request $request): View
    {
        $attendances = $this->student->getAttendanceByDivision(auth()->user()->mentor->division->id);
        return view('mentor.absensi.index', compact('attendances'));
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
    public function store(StoreMentorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mentor $mentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentor $mentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentor $mentor)
    {
        //
    }
}
