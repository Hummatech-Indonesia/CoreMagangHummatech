<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    private StudentInterface $student;
    private StudentService $servicestudent;

    public function __construct(StudentService $servicestudent, StudentInterface $student)
    {
        $this->student = $student;
        $this->servicestudent = $servicestudent;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->getstudentbanned();
        return view('admin.page.user.students-banned' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            $data = $this->servicestudent->store($request);
            $this->student->store($data);
            return redirect()->route('login')->with(['pending' => 'Registrasi Berhasil Silahkan Tunggu Konfirmasi Dari Admin ']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
