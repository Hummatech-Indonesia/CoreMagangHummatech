<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentTaskInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Models\StudentTask;
use App\Http\Requests\StoreStudentTaskRequest;
use App\Http\Requests\UpdateStudentTaskRequest;
use App\Services\StudentTaskService;

class StudentTaskController extends Controller
{
    private StudentTaskInterface $studentTask;
    private StudentTaskService $servicestudentTask;
    private TaskInterface $task;

    public function __construct(StudentTaskService $servicestudentTask, StudentTaskInterface $studentTask, TaskInterface $task)
    {
        $this->studentTask = $studentTask;
        $this->servicestudentTask = $servicestudentTask;
        $this->task = $task;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->task->getUnsubmittedTasks();
        $taskDones = $this->studentTask->whereTaskDone(auth()->user()->student->id);
        $taskPendings = $this->studentTask->whereTaskPending(auth()->user()->student->id);
        return view('student_offline.task.index', compact('tasks', 'taskDones', 'taskPendings'));
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
    public function store(StoreStudentTaskRequest $request)
    {
        $data = $this->servicestudentTask->store($request);
        $this->studentTask->store($data);
        return back()->with('success' , 'Berhasil Mengumpulkan tugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentTask $studentTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentTask $studentTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentTaskRequest $request, StudentTask $studentTask)
    {
        $data = $this->servicestudentTask->update($studentTask, $request);
        $this->studentTask->update($studentTask->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Jawaban');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentTask $studentTask)
    {
        $this->servicestudentTask->delete($studentTask);
        $this->studentTask->delete($studentTask->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
