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
        // $courses = $this->course->whereDivision(auth()->user()->mentor->id);
        // foreach ($courses as $course) {
        //     $subCourses = $this->subCourse->whereCourse($course->id);
        //     foreach ($subCourses as $subCourse) {
        //         $tasks = $this->task->whereSubCourse($subCourse->id);
        //     }
        // }
        $mentorStudents = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $journals = null;
        foreach ($mentorStudents as $mentorStudent) {
            $journals = $this->journal->whereStudent($mentorStudent->student_id);
        }
        return view('mentor.Journal.index', compact('journals'));
    }
}
