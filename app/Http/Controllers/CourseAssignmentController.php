<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseAssignmentInterface;
use App\Http\Requests\CourseAssignmentRequest;
use App\Models\Course;
use App\Models\CourseAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseAssignmentController extends Controller
{
    private CourseAssignmentInterface $courseAssignment;
    public function __construct(CourseAssignmentInterface $courseAssignmentInterface)
    {
        $this->courseAssignment = $courseAssignmentInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $course
     * @return RedirectResponse
     */
    public function store(CourseAssignmentRequest $request, Course $course): RedirectResponse
    {
        $data = $request->validated();
        $data['course_id'] = $course->id;
        $this->courseAssignment->store($data);
        return redirect()->back()->with('success', 'Berhasil menyimpan tugas');
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
    public function update(CourseAssignmentRequest $request, CourseAssignment $courseAssignment)
    {
        $data = $request->validated();
        $this->courseAssignment->update($courseAssignment->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbarui tugas');
    }

    /**
     * destroy
     *
     * @param  mixed $courseAssignment
     * @return RedirectResponse
     */
    public function destroy(CourseAssignment $courseAssignment): RedirectResponse
    {
        $this->courseAssignment->delete($courseAssignment->id);
        return redirect()->back()->with('success', 'Berhasil menghapus tugas');
    }
}
