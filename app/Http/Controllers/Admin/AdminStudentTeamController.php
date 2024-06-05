<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Http\Controllers\Controller;
use App\Services\BoardService;
use Illuminate\Http\Request;

class AdminStudentTeamController extends Controller
{
    private HummataskTeamInterface $hummataskTeam;
    private StudentTeamInterface $studentTeam;
    private ProjectInterface $project;
    private CategoryBoardInterface $categoryBoard;
    private BoardInterface $board;
    private BoardService $boardService;

    public function __construct(HummataskTeamInterface $hummataskTeam, StudentTeamInterface $studentTeam, ProjectInterface $project, CategoryBoardInterface $categoryBoard, BoardInterface $board, BoardService $boardService)
    {
        $this->hummataskTeam = $hummataskTeam;
        $this->studentTeam = $studentTeam;
        $this->project = $project;
        $this->categoryBoard = $categoryBoard;
        $this->board = $board;
        $this->boardService = $boardService;
    }

    public function index()
    {
        $teams = $this->hummataskTeam->get();
        return view('admin.page.offline-students.team.index', compact('teams'));
    }

    public function show($slug)
    {
        $team = $this->hummataskTeam->slug($slug);
        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);
        $project = $this->project->getProjectAccepted($team->id);
        $categoryBoards = $this->categoryBoard->getByHummataskTeamId($team->id);
        $boardCounts = $this->boardService->getBoardCountsByCategory($team->id);

        return view('admin.page.offline-students.team.detail', compact('team', 'studentTeams', 'project', 'categoryBoards','boardCounts'));
    }
}
