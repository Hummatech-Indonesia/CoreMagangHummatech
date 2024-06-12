<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\CourseAssignmentInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseAssignmentStudentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseAssignmentController extends Controller
{
    private CourseAssignmentInterface $courseAssignment;
    public function __construct(CourseAssignmentInterface $courseAssignmentInterface)
    {
        $this->courseAssignment = $courseAssignmentInterface;
    }

    /**
     * show
     *
     * @param  mixed $courseAssignment
     * @return JsonResponse
     */
    public function show(CourseAssignmentInterface $courseAssignment): JsonResponse
    {
        return ResponseHelper::success(CourseAssignmentStudentResource::make($this->courseAssignment->show($courseAssignment->id)));
    }
}
