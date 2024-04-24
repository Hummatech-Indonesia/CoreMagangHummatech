<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;

class CourseController extends Controller
{
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private CourseService $service;
    private DivisionInterface $division;
    private UserInterface $userInterface;

    public function __construct(
        CourseInterface $course ,
        CourseService $service ,
        SubCourseInterface $subCourse,
        DivisionInterface $division,
        UserInterface $userInterface
    )
    {
        $this->division = $division;
        $this->course = $course;
        $this->service = $service;
        $this->subCourse = $subCourse;
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->course->get();
        $divisions = $this->division->get();

        return view('admin.page.course.index' , compact('courses','divisions'));
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
    public function store(StoreCourseRequest $request)
    {
        $data = $this->service->store($request);
        $courseData = $this->course->store($data);
        $this->userInterface->addCourseToSubcribedUser($courseData->id);

        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $id  = $course->id;
        $countSub = $this->subCourse->count();
        $subCourses = $this->subCourse->where($course->id);
        $course = $this->course->show($course->id);
        return view('admin.page.course.detail' , compact('course' , 'subCourses' , 'countSub' , 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $this->service->update($course, $request);
        $this->course->update($course->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->service->delete($course);
        $this->course->delete($course->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
