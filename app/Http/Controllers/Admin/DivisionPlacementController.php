<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class DivisionPlacementController extends Controller
{
    private StudentInterface $student;
    private DivisionInterface $division;
    private MentorDivisionInterface $mentorDivision;
    private MentorStudentInterface $mentorStudent;

    /**
     * Create a new controller instance.
     */
    public function __construct(StudentInterface $student, DivisionInterface $division, MentorStudentInterface $mentorStudent, MentorDivisionInterface $mentorDivision)
    {
        $this->student = $student;
        $this->mentorStudent = $mentorStudent;
        $this->mentorDivision = $mentorDivision;
        $this->division = $division;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $studentid = $this->student->pluck('id')->toArray();
        $studentOfflines = $this->student->getstudentdivisionplacement($request);
        $students = $this->student->getstudentdivisionplacementedit($request);
        $divisions = $this->division->get();
        return view('admin.page.offline-students.division-placement', compact('studentOfflines', 'divisions', 'students'));
    }

    // public function divisionplacement( UpdateStudentRequest $request, Student $student)
    // {
    //     $mentorDivisions = $this->mentorDivision->whereMentorDivision($request->division_id);
    //     foreach ($mentorDivisions as $mentor) {
    //         $data['student_id'] = $student->id;
    //         $data['mentor_id'] = $mentor->id;
    //         $this->mentorStudent->store($data);
    //     }
    //     $this->student->update($student->id, ['division_id' => $request->division_id]);
    //     return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
    // }

    public function divisionplacement(UpdateStudentRequest $request, Student $student)
    {
        try {
            $mentorDivisions = $this->mentorDivision->whereMentorDivision($request->division_id);

            foreach ($mentorDivisions as $mentorDivision) {
                $data = [
                    'mentor_id' => $mentorDivision->id,
                    'student_id' => $student->id,
                ];
                $this->mentorStudent->store($data);
            }

            $this->student->update($student->id, ['division_id' => $request->division_id]);

            return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal menetapkan divisi: ' . $e->getMessage()]);
        }
    }

    // public function divisionchange( UpdateStudentRequest $request, Student $student)
    // {
    //     $mentorDivisions = $this->mentorDivision->whereMentorDivision($student->division_id);
    //     // dd($mentorDivisions);
    //     foreach ($mentorDivisions as $mentorDivision) {
    //         $data['student_id'] = $student->id;
    //         $data['mentor_id'] = $mentorDivision->mentor_id;
    //         $mentorStudent = $this->mentorStudent->studentFirst($student->id, $mentorDivision->mentor_id);
    //         dd($request, $student, $mentorDivisions, $mentorStudent->id);
    //         $this->mentorStudent->update($mentorStudent->id, $data);
    //     }
    //     $this->student->update($student->id, ['division_id' => $request->division_id]);
    //     return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
    // }

    public function divisionchange(UpdateStudentRequest $request, Student $student)
    {
        $oldMentorDivisions = $this->mentorDivision->whereMentorDivision($student->division_id);

        foreach ($oldMentorDivisions as $oldMentorDivision) {
            $this->mentorStudent->deleteByStudentAndMentor($student->id, $oldMentorDivision->mentor_id);
        }

        // Update divisi siswa
        $this->student->update($student->id, ['division_id' => $request->division_id]);

        // Ambil semua mentor yang ada di divisi baru
        $newMentorDivisions = $this->mentorDivision->whereMentorDivision($request->division_id);

        // Insert data baru ke tabel mentorStudent
        foreach ($newMentorDivisions as $newMentorDivision) {
            $data['student_id'] = $student->id;
            $data['mentor_id'] = $newMentorDivision->mentor_id;

            // Cek apakah entri sudah ada, jika tidak, tambahkan entri baru
            $mentorStudent = $this->mentorStudent->studentFirst($student->id, $newMentorDivision->mentor_id);
            if (!$mentorStudent) {
                $this->mentorStudent->store($data);
            } else {
                $this->mentorStudent->update($mentorStudent->id, $data);
            }
        }

        return redirect()->back()->with(['success' => 'Berhasil menetapkan divisi']);
    }

}
