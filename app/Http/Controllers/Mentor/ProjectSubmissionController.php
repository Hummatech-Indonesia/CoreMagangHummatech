<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Enum\ProjectAcceptStatus;
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
        $waiting_projects = $this->project->where('status', 'waiting');
        $history_projects = $this->project->whereIn('status', ['accept', 'rejected']);

        // dd($history_projects);

        return view('mentor.project-submission2.index', compact('waiting_projects', 'history_projects', 'search'));
    }

    public function show(Project $project)
    {
        $project->load('members.members');
        return view('mentor.project-submission2.detail', compact('project'));
    }

    public function accept(Project $project)
    {
        try {
            $data = [];
            $this->project->accProject($project->id, $data);

            return redirect()->back()
                ->with('success', 'Proyek berhasil diterima dan data telah diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menerima proyek: ' . $e->getMessage());
        }
    }

    public function reject(Project $project)
    {
        try {
            $data = [];
            $this->project->rejectProject($project->id, $data);

            return redirect()->back()
                ->with('success', 'Proyek berhasil ditolak dan data telah diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menerima proyek: ' . $e->getMessage());
        }
    }

    public function revision(Project $project)
    {
        $revisions = $this->project->getProjectWithRevision($project->id);
        return view('mentor.project-submission2.revision', compact('project', 'revisions'));
    }
}
