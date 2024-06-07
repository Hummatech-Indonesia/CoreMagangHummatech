<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PresentationScheduleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HummataskPresentationController extends Controller
{
    private PresentationInterface $presentation;
    private MentorStudentInterface $mentorStudent;
    public function __construct(PresentationInterface $presentationInterface, MentorStudentInterface $mentorStudentInterface)
    {
        $this->mentorStudent = $mentorStudentInterface;
        $this->presentation = $presentationInterface;
    }

    /**
     * schedule
     *
     * @return JsonResponse
     */
    public function schedule(): JsonResponse
    {
        $schedules = $this->presentation->getScheduleTodayByMentor($this->mentorStudent->getByStudent(auth()->user()->student->id)->mentor_id);
        return ResponseHelper::success(PresentationScheduleResource::collection($schedules));
    }
}
