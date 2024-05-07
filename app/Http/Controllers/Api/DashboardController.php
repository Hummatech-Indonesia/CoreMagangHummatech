<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\MentorStudentResource;
use App\Models\MentorStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private ZoomScheduleInterface $zoom;
    private MentorStudentInterface $mentorStudent;

    public function __construct(ZoomScheduleInterface $zoom, MentorStudentInterface $mentorStudent)
    {
        $this->zoom = $zoom;
        $this->mentorStudent = $mentorStudent;
    }

    public function index()
    {
        $zoom = $this->zoom->get();
        $data['result'] = $zoom;
        return response()->json($data, 200);
    }

    public function mentorStudent()
    {
        $mentorStudent = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);

            return ResponseHelper::success(MentorStudentResource::collection($mentorStudent));

    }
}
