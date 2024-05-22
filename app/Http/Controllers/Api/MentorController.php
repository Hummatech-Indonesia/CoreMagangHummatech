<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    private StudentInterface $student;
    private JournalInterface $journal;
    public function __construct(StudentInterface $studentInterface, JournalInterface $journalInterface)
    {
        $this->student = $studentInterface;
        $this->journal = $journalInterface;
    }

    /**
     *
     * student attendances
     * @return JsonResponse
     *
     */
    public function studentAttendances(): JsonResponse
    {
        $attendaces = $this->student->getAttendanceByDivision(auth()->user()->mentor->division->id);
        return response()->json([
            'result' => $attendaces,
        ], 200);
    }

    /**
     * student journal offline
     * @return JsonResponse
     *
     */
    public function studentJournalOffline(): JsonResponse
    {
        $journals = $this->journal->getByStudentOffline();
        return response()->json([
            'result' => $journals,
        ], 200);
    }

    /**
     * student journal online
     * @return JsonResponse
     *
     */
    public function studentJournalOnline(): JsonResponse
    {
        $journals = $this->journal->getByStudentOnline();
        return response()->json([
            'result' => $journals,
        ], 200);
    }
}
