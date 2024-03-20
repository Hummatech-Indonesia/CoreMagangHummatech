<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
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
    public function __construct(DivisionInterface $division, MentorInterface $mentor, StudentInterface $student, MentorService $mentorservice)
    {
        $this->division = $division;
        $this->mentor = $mentor;
        $this->student = $student;
        $this->mentorservice = $mentorservice;
    }
    public function index()
    {
        $divisions = $this->division->get();
        $mentors = $this->mentor->get();
        $students = $this->student->where();
        return view('admin.page.user.mentor', compact('divisions', 'mentors', 'students'));
    }

    public function store(StoreMentorRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['student_id']);
        $mentor = $this->mentor->store($validatedData);
        if($request->student_id){
            $this->mentorservice->store($request, $mentor);
        }

        return back()->with('succes', 'Mentor Berhasil Ditambahkan');
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        $validatedData = $request->validated();
        $mentor = $this->mentor->update($mentor->id, $validatedData);
        return back()->with('succes', 'Mentor Berhasil Diubah');
    }

    public function destroy(Mentor $mentor)
    {
       $this->mentor->delete($mentor->id);
       return back()->with('succes', 'Mentor Berhasil Dihapus');
    }
}
