<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentFaceResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    private StudentInterface $student;
    public function __construct(StudentInterface $studentInterface)
    {
        $this->student = $studentInterface;
    }

    public function index(): JsonResponse
    {
        $students = $this->student->getStudentAccepted();
        $response = [
            'result' => StudentFaceResource::collection($students)
        ];

        return response()->json($response);
    }
}
