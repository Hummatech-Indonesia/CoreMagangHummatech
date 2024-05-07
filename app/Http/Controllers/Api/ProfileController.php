<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private StudentInterface $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $student = $this->student->getApiStudent();

        return response()->json([
            'result' => $student
        ]);
    }
}
