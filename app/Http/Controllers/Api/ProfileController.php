<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private StudentInterface $student;
    private HummataskTeamInterface $hummatask_team;
    private StudentTeamInterface $studentTeam;


    public function __construct(StudentInterface $student,HummataskTeamInterface $hummatask_team,StudentTeamInterface $studentTeam)
    {
        $this->student = $student;
        $this->hummatask_team = $hummatask_team;
        $this->studentTeam = $studentTeam;
    }

    public function index(Request $request)
    {
        $student = $this->student->getApiStudent();
        return ResponseHelper::success(ProfileResource::collection($student));
    }

    /**
     * studentAllTeam
     *
     * @return JsonResponse
     */
    public function studentAllTeam(): JsonResponse
    {
        $hummataskTeams = $this->hummatask_team->getByStudent(auth()->user()->student->id);
        return ResponseHelper::success($hummataskTeams);
    }

    public function hummataskteam()
    {
        $hummataskTeams = $this->hummatask_team->where('student_id', auth()->user()->student->id);
        $studentTeams = $this->studentTeam->where('student_id', auth()->user()->student->id);
        return response()->json([
            'hummatask_team' => $hummataskTeams,
            'student_Team' => $studentTeams
        ]);
    }
}
