<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\MentorStudentResource;
use App\Http\Resources\ZoomScheduleResource;
use App\Models\MentorStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private ZoomScheduleInterface $zoom;
    private MentorStudentInterface $mentorStudent;
    private AppointmentOfMentorInterface $appointment;

    public function __construct(ZoomScheduleInterface $zoom, MentorStudentInterface $mentorStudent ,AppointmentOfMentorInterface $appointment)
    {
        $this->zoom = $zoom;
        $this->mentorStudent = $mentorStudent;
        $this->appointment = $appointment;
    }

    public function index()
    {
        $zoom = $this->zoom->get();
        $data['result'] = ZoomScheduleResource::collection($zoom);
        return response()->json($data, 200);
    }

    public function mentorStudent()
    {
        $mentorStudent = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        return ResponseHelper::success(MentorStudentResource::collection($mentorStudent));
    }

    public function count()
    {
        $countCourse = $this->appointment->count();
        $mentorStudent = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $jumlahSiswa = $mentorStudent->count();
        return response()->json([
            'count_course' => $countCourse,
            'count_student' => $jumlahSiswa
        ]);
    }
}
