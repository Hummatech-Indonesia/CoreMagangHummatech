<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    private StudentInterface $student;
    public function __construct(StudentInterface $studentInterface)
    {
        $this->student = $studentInterface;
    }

    /**
     *
     * student attendances
     * @return JsonResponse
     *
     */
    public function studentAttendances(): JsonResponse
    {
        $attendaces = $this->student->getAttendanceByDivision(auth()->user()->mentor->division->id);
        return response()->json([
            'result' => $attendaces,
        ]);
    }
}
