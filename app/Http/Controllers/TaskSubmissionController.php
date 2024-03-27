<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TaskSubmissionInterface;
use App\Models\TaskSubmission;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;
use App\Models\Task;
use App\Services\TaskSubmissionService;
use Illuminate\Http\Request;

class TaskSubmissionController extends Controller
{
    private TaskSubmissionInterface $taskSubmission;
    private TaskSubmissionService $taskSubmissionService;

    public function __construct(TaskSubmissionInterface $taskSubmission, TaskSubmissionService $taskSubmissionService)
    {
        $this->taskSubmission = $taskSubmission;
        $this->taskSubmissionService = $taskSubmissionService;
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
    public function create(Task $task)
    {
        $submissions = $task->submissions()->paginate(5);
        return view('student_online.task.answer-detail', compact('task', 'submissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskSubmissionRequest $request)
    {
        $data = $this->taskSubmissionService->store($request);
        $this->taskSubmission->store($data);

        return redirect()->back()->with('success', 'Tugas telah dikumpulkan, tunggu proses kurasi dari mentor.');
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

    public function download(TaskSubmission $taskSubmission)
    {
        $submissions = $this->taskSubmission->download($taskSubmission);
        return $submissions;
    }
}
