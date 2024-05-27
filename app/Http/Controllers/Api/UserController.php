<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private StudentInterface $student;
    private UserInterface $user;
    public function __construct(UserInterface $user ,StudentInterface $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    public function index()
    {
        $users = $this->user->get();
        return ResponseHelper::success(UserResource::collection($users));
    }

    public function show(Student $student)
    {
        $students = $this->student->show($student->id);
        return response()->json([
            'result' => $students
        ]);
    }
}
