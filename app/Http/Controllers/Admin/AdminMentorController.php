<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Models\Mentor;
use App\Services\MentorService;

class AdminMentorController extends Controller
{
    private DivisionInterface $division;
    private MentorInterface $mentor;
    private StudentInterface $student;
    private MentorService $mentorservice;
    private MentorStudentInterface $mentorStudent;
    public function __construct(DivisionInterface $division, MentorInterface $mentor, StudentInterface $student, MentorService $mentorservice, MentorStudentInterface $mentorStudent)
    {
        $this->division = $division;
        $this->mentorStudent = $mentorStudent;
        $this->mentor = $mentor;
        $this->student = $student;
        $this->mentorservice = $mentorservice;
    }
    public function index()
    {
        $divisions = $this->division->get();
        $mentors = $this->mentor->get();
        $check_id = $this->mentorStudent->pluck('student_id');
        $students = $this->student->where();
        return view('admin.page.user.mentor', compact('divisions', 'mentors', 'students'));
    }

    public function store(StoreMentorRequest $request)
    {
        $data = $this->mentorservice->store($request);
        $this->mentor->store($data);
        return back()->with('succes', 'Mentor Berhasil Ditambahkan');
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        $data = $this->mentorservice->update($mentor, $request);
        $mentor = $this->mentor->update($mentor->id, $data);
        return back()->with('succes', 'Mentor Berhasil Diubah');
    }

    public function destroy(Mentor $mentor)
    {

       $this->mentor->delete($mentor->id);
       return back()->with('succes', 'Mentor Berhasil Dihapus');
    }
}
