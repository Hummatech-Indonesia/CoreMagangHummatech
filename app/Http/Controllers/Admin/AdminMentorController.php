<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enum\RolesEnum;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Models\Mentor;
use App\Models\Student;
use App\Services\MentorDivisionService;
use App\Services\MentorService;
use App\Services\MentorStudentService;
use DB;
use Hash;

class AdminMentorController extends Controller
{
    private DivisionInterface $division;
    private MentorInterface $mentor;
    private MentorDivisionService $mentorDivisionService;
    private StudentInterface $student;
    private MentorService $mentorservice;
    private MentorStudentInterface $mentorStudent;
    private MentorDivisionInterface $mentorDivision;
    private MentorStudentService $mentorStudentService;
    private UserInterface $user;

    public function __construct(UserInterface $user, DivisionInterface $division, MentorDivisionService $mentorDivisionService, MentorInterface $mentor, StudentInterface $student, MentorService $mentorservice, MentorStudentInterface $mentorStudent, MentorDivisionInterface $mentorDivision, MentorStudentService $mentorStudentService)
    {
        $this->division = $division;
        $this->mentorStudent = $mentorStudent;
        $this->mentor = $mentor;
        $this->mentorDivision = $mentorDivision;
        $this->student = $student;
        $this->mentorDivisionService = $mentorDivisionService;
        $this->mentorservice = $mentorservice;
        $this->user = $user;
        $this->mentorStudentService = $mentorStudentService;
    }
    public function index(Request $request)
    {
        $divisions = $this->division->get();

        $mentors = $this->mentor->search($request)->paginate(10);

        $check_id = $this->mentorStudent->pluck('student_id');

        return view('admin.page.user.mentor', compact('divisions', 'mentors'));
    }

    public function store(StoreMentorRequest $request)
    {
        // Menyimpan data mentor
        $data = $this->mentorservice->store($request);
        foreach ($request->division_id as $division) {
            $data['division_id'] = $division;
        }
        $mentor = $this->mentor->store($data);
        $this->mentorDivisionService->store($request, $mentor);

        $dataUser = [
            'name' => $mentor->name,
            'email' => $mentor->email,
            'password' => Hash::make('password'),
            'mentors_id' => $mentor->id,
        ];
        $user = $this->user->store($dataUser);
        $user->assignRole(RolesEnum::MENTOR->value);

        foreach ($request->division_id as $division) {
            $students = Student::where('division_id', $division)->get();
            foreach ($students as $student) {
                DB::table('mentor_students')->insert([
                    'mentor_id' => $mentor->id,
                    'student_id' => $student->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return back()->with('success', 'Mentor Berhasil Ditambahkan');
    }

    public function show(Mentor $mentor, Request $request)
    {
        $mentor = $this->mentor->show($mentor->id);
        $studentDivisions = $this->student->whereStudentDivision($mentor->division_id, $request);
        return view('admin.page.user.mentor-detail', compact('mentor','studentDivisions'));
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        $data = $this->mentorservice->update($mentor, $request);
        foreach ($request->division_id as $division) {
            $data['division_id'] = $division;
        }
        $this->mentor->update($mentor->id, $data);
        $this->mentorDivisionService->update($mentor, $request);


        foreach ($request->division_id as $division) {
            $students = Student::where('division_id', $division)->get();
            foreach ($students as $student) {
                DB::table('mentor_students')->insert([
                    'mentor_id' => $mentor->id,
                    'student_id' => $student->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return back()->with('succes', 'Mentor Berhasil Diubah');
    }

    public function destroy(Mentor $mentor)
    {
        $this->mentor->delete($mentor->id);
        return back()->with('succes', 'Mentor Berhasil Dihapus');
    }
}
