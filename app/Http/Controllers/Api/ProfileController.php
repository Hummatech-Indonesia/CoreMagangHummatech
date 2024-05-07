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

        // Membuat array meta dengan kunci code, status, dan message
        $meta = [
            'code' => 200,
            'status' => 'success',
            'message' => 'Berhasil',
        ];

        // Menggabungkan data siswa dan meta menjadi satu array
        $response = [
            'meta' => $meta,
            'data' => $student,
        ];

        return response()->json($response, 200);
    }
}
