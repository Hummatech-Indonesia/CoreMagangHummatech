<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentOfMentorResource;
use Illuminate\Http\Request;

class AppointmentOfMentor extends Controller
{
    private AppointmentOfMentorInterface $appointmentofmentor;

    public function __construct(AppointmentOfMentorInterface $appointmentofmentor)
    {
        $this->appointmentofmentor = $appointmentofmentor;
    }

    public function index()
    {
        $appointmentofmentors = $this->appointmentofmentor->detailAppointment();
        return ResponseHelper::success(AppointmentOfMentorResource::collection($appointmentofmentors));
    }
}
