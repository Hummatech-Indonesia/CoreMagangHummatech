<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\CourseAssignmentInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseAssignment;
use App\Models\SubCourse;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use View;

class CourseController extends Controller
{
    private CourseInterface $course;
    private CourseAssignmentInterface $courseAssignment;
    private SubCourseInterface $subCourse;
    private SubCourseUnlockInterface $subCourseStatus;
    private TaskInterface $taskInterface;
    private CourseUnlockInterface $courseInterface;

    public function __construct(
        CourseAssignmentInterface $courseAssignmentInterface,
        SubCourseInterface $subCourseInterface,
        CourseInterface $course,
        SubCourseUnlockInterface $subCourseStatus,
        TaskInterface $taskInterface,
        CourseUnlockInterface $courseInterface
    ) {
        $this->courseAssignment = $courseAssignmentInterface;
        $this->subCourse = $subCourseInterface;
        $this->course = $course;
        $this->courseInterface = $courseInterface;
        $this->subCourseStatus = $subCourseStatus;
        $this->taskInterface = $taskInterface;
    }

    public function index(Request $request)
    {
        $courses = $this->courseInterface->getCourseByUser(auth()->user()->student->id)
            ->whereHas('course', function ($query) use ($request) {
                if($request->get('search')) {
                    $query->where('title', 'LIKE', '%' . $request->get('search') . '%');
                }
            })->paginate(12);

        return view('student_online.course.index', compact('courses'));
    }

    public function detail(Course $course, Request $request)
    {
        $course = $this->course->show($course->id);
        $subCourses = $this->subCourse->getByCourse($course->id, $request);
        return view('student_online.course.detail', compact('course', 'subCourses'));
    }

        /**
     * detailOffline
     *
     * @param  mixed $course
     * @param  mixed $request
     * @return ViewView
     */
    public function detailOffline(Course $course, Request $request): ViewView
    {
        $course = $this->course->show($course->id);
        $subCourses = $this->subCourse->getByCourse($course->id, $request);
        return view('student_offline.course.course-detail', compact('course', 'subCourses'));
    }

    public function subCourseDetail(Course $course, SubCourse $subCourse)
    {
        $prev = $this->subCourse->getPrevByCourse($course->id, $subCourse->position);
        $next = $this->subCourse->getNextByCourse($course->id, $subCourse->position);
        return view('student_online.course.learn-more', compact('course', 'subCourse', 'prev', 'next'));
    }

    /**
     * offlineSubCourseDetail
     *
     * @param  mixed $course
     * @param  mixed $subCourse
     * @return void
     */
    public function offlineSubCourseDetail(Course $course, SubCourse $subCourse)
    {
        $prev = $this->subCourse->getPrevByCourse($course->id, $subCourse->position);
        $next = $this->subCourse->getNextByCourse($course->id, $subCourse->position);
        return view('student_offline.sub_course.index', compact('course', 'subCourse', 'prev', 'next'));
    }

    /**
     * detailAssignment
     *
     * @param  mixed $course
     * @param  CourseAssignment $courseAssignment
     * @return ViewView
     */
    public function detailAssignment(Course $course, CourseAssignment $courseAssignment): ViewView
    {
        $courseAssignment = $this->courseAssignment->show($courseAssignment->id);
        return view('student_online.course.assignment', compact('course', 'courseAssignment'));
    }

    /**
     * offlineDetailAssignment
     *
     * @param  mixed $course
     * @param  mixed $courseAssignment
     * @return ViewView
     */
    public function offlineDetailAssignment(Course $course, CourseAssignment $courseAssignment): ViewView
    {
        $courseAssignment = $this->courseAssignment->show($courseAssignment->id);
        return view('student_offline.assignment.index', compact('course', 'courseAssignment'));
    }
}
