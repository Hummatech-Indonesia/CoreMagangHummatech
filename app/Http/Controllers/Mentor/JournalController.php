<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;

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
    public function index()
    {
        $mentorStudents = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $journals = [];
        foreach ($mentorStudents as $mentorStudent) {
            $journals[] = $this->journal->whereStudent($mentorStudent->student_id);
        }
        $journalStudents = collect($journals)->flatten();
        // dd($journalStudents);
        return view('mentor.Journal.index', compact('journalStudents'));
    }
}
