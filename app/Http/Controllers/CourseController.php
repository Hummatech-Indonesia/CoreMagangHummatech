<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enum\StatusCourseEnum;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private CourseService $service;
    private DivisionInterface $division;
    private UserInterface $userInterface;
    private CourseUnlockInterface $courseUnlock;
    private SubCourseUnlockInterface $subCourseUnlock;

    public function __construct(
        CourseInterface $course ,
        CourseService $service ,
        SubCourseInterface $subCourse,
        DivisionInterface $division,
        UserInterface $userInterface,
        SubCourseUnlockInterface $subCourseUnlock,
        CourseUnlockInterface $courseUnlock
    )
    {
        $this->division = $division;
        $this->course = $course;
        $this->subCourseUnlock = $subCourseUnlock;
        $this->service = $service;
        $this->subCourse = $subCourse;
        $this->userInterface = $userInterface;
        $this->courseUnlock = $courseUnlock;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $courses = $this->course->get();
        $courses = $this->course->search($request)->paginate(8);
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
        if ($latestPosition = $this->course->getLatestPositionByDivision($request->division_id)) {
            $data['position'] = $latestPosition->position + 1;
        }
        else {
            $data['position'] = 1;
        }
        $courseData = $this->course->store($data);
        if($courseData->getStatus()->value !== 'paid') {
            $this->userInterface->addCourseToSubcribedUser($courseData->id);
        }

        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $id  = $course->id;
        $countSub = $this->subCourse->count();
        $subCourses = $this->subCourse->GetWhere($course->id);
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
