<?php

namespace App\Http\Controllers\Mentor;

use App\Contracts\Interfaces\ChallengeInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\StudentTaskInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Http\Controllers\Controller;
use App\Models\StudentTask;
use App\Models\Task;
use App\Services\StudentTaskService;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    private StudentTaskInterface $studentTask;
    private StudentTaskService $serviceStudentTask;
    private TaskInterface $task;
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private ChallengeInterface $challenge;

    public function __construct(StudentTaskInterface $studentTask, StudentTaskService $serviceStudentTask, TaskInterface $task, CourseInterface $course, SubCourseInterface $subCourse, ChallengeInterface $challenge)
    {
        $this->studentTask = $studentTask;
        $this->serviceStudentTask = $serviceStudentTask;
        $this->task = $task;
        $this->course = $course;
        $this->subCourse = $subCourse;
        $this->challenge = $challenge;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->course->whereDivision(auth()->user()->mentor->id);
        foreach ($courses as $course) {
            $subCourses = $this->subCourse->whereCourse($course->id);
            foreach ($subCourses as $subCourse) {
                $tasks = $this->task->whereSubCourse($subCourse->id);
            }
        }

        $challenges = $this->challenge->whereMentor(auth()->user()->mentor->id);

        return view('mentor.assessment.index', compact('tasks', 'challenges'));

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
    public function show(Task $task)
    {
        $studentTasks = $this->studentTask->whereTask($task->id);
        return view('mentor.assessment.task_detail', compact('studentTasks', 'task'));
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
    public function update(Request $request, StudentTask $studentTask)
    {
        $this->studentTask->update($studentTask->id, $request->all());
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
