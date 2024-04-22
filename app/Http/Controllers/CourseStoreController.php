<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Http\Requests\CourseAddToCartRequest;
use App\Models\Course;
use App\Services\CourseService;

class CourseStoreController extends Controller
{
    private CourseInterface $course;
    private CourseService $courseService;

    public function __construct(CourseInterface $course, CourseService $courseService)
    {
        $this->courseService = $courseService;
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->getUnpaidCourse();
        return view('student_online_&_offline.course-store.index', compact('courses'));
    }

    public function detail(Course $course)
    {
        return view('student_online_&_offline.course-store.details', compact('course'));
    }

    public function store(CourseAddToCartRequest $request)
    {
        $this->courseService->addToCart($request);

        return redirect()->route('transaction-history.checkout');
    }
}
