<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStudentTeamController extends Controller
{
    private HummataskTeamInterface $hummataskTeam;
    private StudentTeamInterface $studentTeam;
    private ProjectInterface $project;

    public function __construct(HummataskTeamInterface $hummataskTeam, StudentTeamInterface $studentTeam, ProjectInterface $project)
    {
        $this->hummataskTeam = $hummataskTeam;
        $this->studentTeam = $studentTeam;
        $this->project = $project;        
    }
    public function index()
    {
        $teams = $this->hummataskTeam->get();
        return view('admin.page.offline-students.team.index', compact('teams'));
    }
}