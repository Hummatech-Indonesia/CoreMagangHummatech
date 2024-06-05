<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    private JournalInterface $journal;
    private StudentInterface $student;
    private MentorStudentInterface $mentorStudent;

    public function __construct(JournalInterface $journal, StudentInterface $student, MentorStudentInterface $mentorStudent)
    {
        $this->student = $student;
        $this->journal = $journal;
        $this->mentorStudent = $mentorStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mentorStudents = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $journals = [];

        // Mengambil parameter pencarian dari request
        $studentName = $request->input('name', '');
        $createdAt = $request->input('created_at', Carbon::today()->toDateString()); // Default ke hari ini jika tidak diisi

        foreach ($mentorStudents as $mentorStudent) {
            $query = $this->journal->search($request->merge(['student_id' => $mentorStudent->student_id, 'created_at' => $createdAt]));
            $journals[] = $query->get();
        }

        $journalStudents = collect($journals)->flatten();
        return view('mentor.Journal.index', compact('journalStudents'));
    }
}
