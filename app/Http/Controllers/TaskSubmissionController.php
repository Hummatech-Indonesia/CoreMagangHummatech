<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TaskInterface;
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
    private TaskInterface $task;

    public function __construct(TaskSubmissionInterface $taskSubmission, TaskSubmissionService $taskSubmissionService, TaskInterface $task)
    {
        $this->taskSubmission = $taskSubmission;
        $this->taskSubmissionService = $taskSubmissionService;
        $this->task = $task;
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
        $submissions = $task->submissions()->latest()->paginate(5);
        return view('student_online.task.answer-detail', compact('task', 'submissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskSubmissionRequest $request)
    {
        $taskData = $this->task->getId($request->task_id);

        # Check task status
        if($taskData->status === 'inprogress') {
            return redirect()->back()->with('error', 'Tugas ini sedang di kerjakan, harap tunggu proses kurasi dari mentor.');
        } elseif($taskData->status === 'completed') {
            return redirect()->back()->with('error', 'Tugas ini telah selesai, kamu nggak perlu ngirim tugas lagi.');
        }

        # Store task submission
        $data = $this->taskSubmissionService->store($request);
        $this->taskSubmission->store($data);

        # Update status task into inprogress
        $taskData->update(['status' => 'inprogress']);

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

    public function download(Task $task, TaskSubmission $taskSubmission)
    {
        $submissions = $this->taskSubmissionService->download($taskSubmission);
        return $submissions;
    }
}
