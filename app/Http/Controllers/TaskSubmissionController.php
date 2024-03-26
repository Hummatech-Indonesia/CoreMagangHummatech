<?php

namespace App\Http\Controllers;

use App\Models\TaskSubmission;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;
use App\Models\Task;

class TaskSubmissionController extends Controller
{
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
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskSubmissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskSubmissionRequest $request, TaskSubmission $taskSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskSubmission $taskSubmission)
    {
        //
    }

    public function detailStudentOnline(Task $task)
    {
        return view('student_online.task.answer-detail', compact('task'));
    }
}
