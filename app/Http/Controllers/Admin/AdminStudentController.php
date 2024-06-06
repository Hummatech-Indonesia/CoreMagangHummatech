<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\DivisionInterface;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\StudentStatusEnum;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Attendance;
use App\Models\Student;

class AdminStudentController extends Controller
{
    private StudentInterface $student;
    private StudentService $servicestudent;
    private DivisionInterface $division;

    /**
     * Create a new controller instance.
     */
    public function __construct(StudentService $servicestudent, StudentInterface $student, DivisionInterface $division)
    {
        $this->student = $student;
        $this->servicestudent = $servicestudent;
        $this->division = $division;
    }

    /**
     * Display a listing of the resource.
     */ public function index(Request $request)
    {
        $schools = $this->student->listStudent($request)->pluck('school')->unique();
        $genders = $this->student->listStudent($request)->pluck('gender')->unique();
        $status = $this->student->listStudent($request)->pluck('status')->unique();


        $students = $this->student->listStudent($request);
        $studentOfflines = $this->student->listStudentOffline($request);
        $studentOnllines = $this->student->listStudentOnline($request);
        $Alumni = $this->student->ListAlumni($request);
        $divisions = $this->division->get();

        $today = date('Y-m-d');
        Student::where('finish_date', '<', $today)
               ->update(['expired' => 'alumni']);

        return view('admin.page.user.index', compact('students', 'studentOfflines', 'studentOnllines', 'divisions', 'schools', 'genders','status' , 'Alumni'));
    }

    /**
     * Show The Face of the resource.
     */
    public function face(Student $student)
    {
        $students = $this->student->show($student->id);
        return view('admin.page.user.face', compact('students'));
    }
    /**
     * Update The Password of the resource.
     */
    public function reset(Student $student)
    {
        $this->student->update($student->id, ['password' => 'password']);
        return redirect()->back()->with(['message' => 'Password Telah Di Reset, Password : password']);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $this->servicestudent->update($student, $request);
        $this->student->update($student->id, $data);
        return redirect()->back()->with(['success' => 'Data Berhasil Telah Di Update']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $this->servicestudent->delete($student);
            $this->student->delete($student->id);
            return redirect()->back()->with(['success' => 'Data Berhasil Telah Di Hapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['errors' => 'Data Masih digunakan di tabel wajah']);
        }
    }

    public function banned(Student $student)
    {
        $this->student->update($student->id, ['status' => StudentStatusEnum::BANNED->value]);
        return redirect()->back()->with(['success' => 'Siswa Berhasil Dibanned']);
    }
}
