<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\FaceInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\FaceRequest;
use App\Http\Requests\StoreFaceRequest;
use App\Models\Employee;
use App\Models\Face;
use App\Models\Student;
use App\Services\FaceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    private FaceService $service;
    private StudentInterface $student;
    private FaceInterface $face;
    public function __construct(FaceInterface $faceInterface, StudentInterface $student, FaceService $faceService)
    {
        $this->face = $faceInterface;
        $this->service = $faceService;
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->get();
        return view('admin.page.face.index', compact('students'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create(): View
    {
        $students = $this->student->get();
        return view('', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaceRequest $request): RedirectResponse
    {
        $data = $this->service->store($request);
        foreach ($data['photo'] as $photo) {
            $this->face->store([
                'student_id' => $data['student_id'],
                'photo' => $photo
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil menambah wajah');
    }


    /**
     * Display the specified resource.
     */
    public function show(Face $face , $id)
    {
        $students = $this->student->show($id);
        $faces = $this->face->show($id);
        return view('admin.page.face.detail' , compact('students' ,'id' ,'faces'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Face $face)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFaceRequest $request, Face $face)
    {
        $data = $this->service->update($request, $face);
        $this->face->delete($face->id);
        foreach ($data['photo'] as $photo) {
            $this->face->store([
                'student_id' => $data['student_id'],
                'photo' => $photo,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil mengupdate');
    }

    /**
     * destroy
     *
     * @param  mixed $employee
     * @return void
     */
    public function destroy(Student $student)
    {
        foreach ($student->faces as $face ) {
            $this->service->remove($face->photo);
        }
        $this->face->delete($student->id);
        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}
