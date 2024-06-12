<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\JournalMentorResource;
use App\Http\Resources\JournalResource;
use App\Http\Resources\StudentAttendanceResource;
use App\Http\Resources\StudentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    private StudentInterface $student;
    private CourseInterface $course;
    private JournalInterface $journal;
    private MentorStudentInterface $mentorStudent;
    public function __construct(StudentInterface $studentInterface, JournalInterface $journalInterface, MentorStudentInterface $mentorStudentInterface, CourseInterface $courseInterface)
    {
        $this->course = $courseInterface;
        $this->mentorStudent = $mentorStudentInterface;
        $this->student = $studentInterface;
        $this->journal = $journalInterface;
    }

    /**
     * studentOfflineAttendances
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function studentOfflineAttendances(Request $request): JsonResponse
    {
        $request->merge(['division_id' => auth()->user()->mentor->division->id, 'internship_type' => InternshipTypeEnum::OFFLINE->value]);
        $attendaces = $this->student->getAttendanceByDivision($request);
        return ResponseHelper::success(StudentAttendanceResource::collection($attendaces));
    }

    /**
     * studentOnlineAttendances
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function studentOnlineAttendances(Request $request): JsonResponse
    {
        $request->merge(['division_id' => auth()->user()->mentor->division->id, 'internship_type' => InternshipTypeEnum::ONLINE->value]);
        $attendaces = $this->student->getAttendanceByDivision($request);
        return ResponseHelper::success(StudentAttendanceResource::collection($attendaces));
    }

    /**
     *
     * get student journal by mentor
     * @return JsonResponse
     *
     */
    public function studentJournal(): JsonResponse
    {
        $mentorStudents = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $studentIds = [];
        foreach ($mentorStudents as $mentorStudent) {
            $studentIds[] = $mentorStudent->student_id;
        }
        $journals = $this->journal->getByStudentIds($studentIds);

        return response()->json([
            'result' => JournalResource::collection($journals)
        ]);
    }

    /**
     * listStudentOffline
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function listStudentOffline(Request $request): JsonResponse
    {
        $request->merge(['mentor_id' => auth()->user()->mentor->id, 'internship_type' => InternshipTypeEnum::OFFLINE->value]);
        $students = $this->student->getByMentor($request);
        return ResponseHelper::success(StudentResource::collection($students));
    }

    /**
     * listStudentOnline
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function listStudentOnline(Request $request): JsonResponse
    {
        $request->merge(['mentor_id' => auth()->user()->mentor->id, 'internship_type' => InternshipTypeEnum::ONLINE->value]);
        $students = $this->student->getByMentor($request);
        return ResponseHelper::success(StudentResource::collection($students));
    }

        /**
     * studentJournalOffline
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function studentJournalOffline(Request $request): JsonResponse
    {
        $request->merge([
            'division_id' => auth()->user()->mentor->division->id,
            'internship_type' => InternshipTypeEnum::OFFLINE->value,
        ]);
        $journals = $this->journal->getByStudents($request);
        return ResponseHelper::success(JournalMentorResource::collection($journals));
    }

    /**
     * student journal online
     * @return JsonResponse
     *
     */
    public function studentJournalOnline(Request $request): JsonResponse
    {
        $request->merge([
            'division_id' => auth()->user()->mentor->division->id,
            'internship_type' => InternshipTypeEnum::ONLINE->value,
        ]);
        $journals = $this->journal->getByStudents($request);
        return ResponseHelper::success(JournalMentorResource::collection($journals));
    }

    /**
     * courses
     *
     * @return JsonResponse
     */
    public function courses(): JsonResponse
    {
        $courses = $this->course->whereDivision(auth()->user()->mentor->division->id);
        return ResponseHelper::success(CourseResource::collection($courses));
    }

    /**
     * statistic
     *
     * @return JsonResponse
     */
    public function statistic(): JsonResponse
    {
        $data['courses'] = $this->course->countByMentor(auth()->user()->mentor->division->id);
        $data['students'] = $this->student->countByMentor(auth()->user()->mentor->id);
        return ResponseHelper::success($data);
    }
}
