<?php

namespace App\Http\Controllers\StudentOfline;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseOfflineController extends Controller
{
    private DivisionInterface $division;
    private CourseInterface $course;
    private TaskInterface $task;
    private SubCourseInterface $subCourse;

    public function __construct(DivisionInterface $division, CourseInterface $course, TaskInterface $task, SubCourseInterface $subCourse)
    {
        $this->subCourse = $subCourse;
        $this->task = $task;
        $this->course = $course;
        $this->division = $division;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = $this->task->get();
        $taskCount = $task->count();
        $subCourse = $this->subCourse->get();
        $subCourseCount = $subCourse->count();
        $divisions = $this->division->get();
        $courses = $this->course->GetWhere(auth()->user()->student->division_id);

        return view('student_offline.course.index', compact('divisions','courses','task','taskCount','subCourse','subCourseCount'));
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
    public function show(Course $course)
    {
        $task = $this->task->get();
        $taskCount = $task->count();
        $subCourse = $this->subCourse->where($course->id);
        $subCourseCount = $subCourse->count();
        $courses = $this->course->show($course->id);
        return view('student_offline.course.detail' , compact('subCourse' , 'subCourseCount' , 'courses','task','taskCount'));
    }

    public function showSub(SubCourse $subCourse)
    {
        $task = $this->task->get();
        $taskCount = $task->count();
        $subCourse = $this->subCourse->show($subCourse->id);
        $subCourseCount = $subCourse->count();
        // $courses = $this->course->show($subCourse->id);
        $courses = $this->course->get();

        return view('student_offline.course.learn-more' , compact('subCourse' , 'subCourseCount' ,'task','taskCount','courses'));
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
