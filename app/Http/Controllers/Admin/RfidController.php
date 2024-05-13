<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRfidRequest;
use App\Http\Requests\UpdateRfidRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    private StudentInterface $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->student->whereRfidNull($request);
        $rfidStudents = $this->student->listRfid($request);
        return view('admin.page.user.rfid', compact('students','rfidStudents'));
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
    public function store(StoreRfidRequest $request, Student $student)
    {
        $this->student->update($student->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mendaftarkan RFID '.$student->name);
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
    public function update(UpdateRfidRequest $request, Student $student)
    {
        $this->student->update($student->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil memperbarui RFID milik '.$student->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
