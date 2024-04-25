<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enum\StatusCourseEnum;
use App\Models\SubCourse;
use App\Http\Requests\StoreSubCourseRequest;
use App\Http\Requests\UpdateSubCourseRequest;
use App\Models\Course;
use App\Services\SubCourseService;

class SubCourseController extends Controller
{

    private SubCourseInterface $subCourse;
    private SubCourseService $service;
    private CourseInterface $course;
    private TaskInterface $task;
    private UserInterface $userInterface;

    public function __construct(
        SubCourseInterface $subCourse,
        SubCourseService $service,
        CourseInterface $course,
        TaskInterface $task,
        UserInterface $userInterface
    )
    {
        $this->task = $task;
        $this->subCourse = $subCourse;
        $this->course = $course;
        $this->service = $service;
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCourses = $this->subCourse->get();
        $courses = $this->course->get();
        return view('' , compact('subCourses', 'courses'));
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
    public function store(StoreSubCourseRequest $request)
    {
        $data = $this->service->store($request);
        $course = $this->subCourse->store($data);

        if($course->course->getStatus()->value !== 'paid') {
            $this->userInterface->addSubCourseToSubcribedUser($course->course->id, $course->id);
        }

        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCourse $subCourse)
    {
        $subCourses = $this->subCourse->show($subCourse->id);
        $task = $this->task->get();
        $courses = $this->course->get();

        return view('admin.page.course.sub-course.index' , compact('subCourses','task','courses', 'subCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCourse $subCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCourseRequest $request, SubCourse $subCourse)
    {
        $data = $this->service->update($subCourse, $request);
        $this->subCourse->update($subCourse->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCourse $subCourse)
    {
        $this->service->delete($subCourse);
        $this->subCourse->delete($subCourse->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
