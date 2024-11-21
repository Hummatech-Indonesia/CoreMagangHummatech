<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\CategoryProjectInterface;

class ProjectSubmissionController extends Controller
{
    private ProjectInterface $project;
    private Project $projects;
    private HummataskTeamInterface $hummataskTeam;
    private MentorDivisionInterface $mentorDivision;
    private CategoryProjectInterface $categoryProject;


    public function __construct(ProjectInterface $projectInterface)
    {
        $this->project = $projectInterface;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $projects = $this->project->get($search);
        // dd($projects);
        return view('mentor.project-submission2.index', compact('projects', 'search'));
    }

    public function accept($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'accepted';
        $project->save();

        return redirect()->back()->with('success', 'Proyek telah diterima.');
    }

    public function reject($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'rejected';
        $project->save();

        return redirect()->back()->with('error', 'Proyek telah ditolak.');
    }
}
