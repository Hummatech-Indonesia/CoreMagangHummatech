<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends Controller
{
    private StudentInterface $student;
    private StudentService $servicestudent;
    private MentorStudentInterface $mentorStudent;

    public function __construct(StudentService $servicestudent, StudentInterface $student, MentorStudentInterface $mentorStudent)
    {
        $this->student = $student;
        $this->servicestudent = $servicestudent;
        $this->mentorStudent = $mentorStudent;
    }

    /**
     * getStudents
     *
     * @return JsonResponse
     */
    public function getStudents(): JsonResponse
    {
        $students = $this->student->getStudentAccepted();

        $serializedData = serialize($students);
        $md5 = md5($serializedData);

        $response = [
            'total' => count($students),
            'md5' => $md5,
            'result' => StudentResource::collection($students)
        ];
        return response()->json($response, 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->student->getstudentbanned($request);
        return view('admin.page.user.students-banned' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Openbanned(Student $student)
    {
        $this->student->update($student->id, ['status' => 'accepted']);
        return redirect()->back()->with(['success' => 'Pengguna Berhasil Di Unbaned']);
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
    public function mentorStudent(Student $student)
    {
        $mentorStudent = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);

        return view('mentor.student.index', compact('mentorStudent'));
    }
}
