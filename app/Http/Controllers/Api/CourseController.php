<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ActiveCourseInterface;
use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceRuleResource;
use App\Http\Resources\CourseAssignmentResource;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Request;

class CourseController extends Controller
{
    private CourseInterface $course;
    private ActiveCourseInterface $activeCourse;

    public function __construct(CourseInterface $course, ActiveCourseInterface $activeCourseInterface)
    {
        $this->activeCourse = $activeCourseInterface;
        $this->course = $course;
    }
    public function index()
    {
            $courses = $this->course->get();
            $data['result'] = CourseResource::collection($courses);
            return response()->json($data);

    }

    /**
     *
     * active course
     * @return JsonResponse
     *
     */
    public function activeCourses(): JsonResponse
    {
        $courses = $this->activeCourse->getByStudent(auth()->user()->student->id);
        return response()->json([
            'result' => $courses
        ]);
    }

    /**
     * courseAssignment
     *
     * @param  mixed $course
     * @return JsonResponse
     */
    public function courseAssignment(Course $course): JsonResponse
    {
        return ResponseHelper::success(CourseAssignmentResource::collection($course->courseAssignments));
    }

    /**
     *
     * nonactive course
     * @return JsonResponse
     *
     */
    public function nonactiveCourses(): JsonResponse
    {
        $courses = $this->course->getNonactiveCourse(auth()->user()->student->division_id, auth()->user()->student->id);
        return ResponseHelper::success(CourseResource::collection($courses));
    }
}
