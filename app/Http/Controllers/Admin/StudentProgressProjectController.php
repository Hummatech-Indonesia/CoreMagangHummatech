<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\ProjectInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;

class StudentProgressProjectController extends Controller
{
    private ProjectInterface $project;
    private StudentInterface $student;

    public function __construct(
        ProjectInterface $project,
        StudentInterface $student
    ) {
        $this->project = $project;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->project->get();
        $acceptAndrejected_projects = $this->project->wherein('status', ['accept','rejected']);
        $waiting_projects = $this->project->where('status','waiting');
        $completed_projects = $this->project->where('status_project','completed');

        return view('admin.page.student-progress.project.index', compact('projects','acceptAndrejected_projects','waiting_projects','completed_projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $project)
    {
        $project = $this->project->show($project);
        return view('admin.page.student-progress.project.detail', compact('project'));
    }
    public function showRevision(int $project)
    {
        $project = $this->project->show($project);
        $revisions = $this->project->getProjectWithRevision($project->id);
        $todo_revisions = $this->project->getProjectWithRevision($project->id,'status','todo');
        $inprogress_revisions = $this->project->getProjectWithRevision($project->id,'status','in progress');
        $completed_revisions = $this->project->getProjectWithRevision($project->id,'status','completed');
        return view('admin.page.student-progress.project.revision', compact('project','revisions','todo_revisions','inprogress_revisions','completed_revisions'));
    }

    public function progressProject(Project $project)
    {
        $project->load([
            'members.members',
            'presentation.revision.assignedStudent'
        ]);

        if ($project->presentation === null) {
            // If presentation is null
            $total_revisi = 0;
            $total_progress = 0;
            $total_revisi_dont_completed = 0;
            $anggota = [];
            return view('admin.page.student-progress.project.progress-project', compact('project', 'total_revisi', 'anggota', 'total_progress', 'total_revisi_dont_completed'));
        } elseif ($project->presentation->revision === null || $project->presentation->revision->count() === 0) {
            // If revision is null or has no count
            $total_revisi = 0;
            $total_progress = 0;
            $total_revisi_dont_completed = 0;
            $anggota = [];
            return view('admin.page.student-progress.project.progress-project', compact('project', 'total_revisi', 'anggota', 'total_progress', 'total_revisi_dont_completed'));
        }

        $total_revisi = $project->presentation->revision->count();
        $total_revisi_done = $project->presentation->revision->where('status', 'completed')->count() ?? 0;
        $total_revisi_todo = $project->presentation->revision->where('status', 'completed', 'in progress')->count() ?? 0;

        if ($total_revisi_done > 0) {
            $total_progress = ($total_revisi_done / $total_revisi) * 100;
        } else {
            $total_progress = 0;
        }

        if ($total_revisi_todo > 0) {
            $total_revisi_dont_completed = ($total_revisi_todo / $total_revisi) * 100;
        } else {
            $total_revisi_dont_completed = 0;
        }

        if ($total_revisi == 0) {
            $anggota = [];
            return view('admin.page.student-progress.project.progress-project', compact('project', 'anggota', 'total_revisi', 'total_progress'));
        }

        $anggota = [];
        $total_revisi_terassign = 0;

        foreach ($project->members as $member) {
            $revisi_dikerjakan = $project->presentation->revision->where('status', 'completed')->filter(function ($revision) use ($member) {
                return $revision->assignedStudent->contains('id', $member->members->id);
            })->count();

            $revisi_percent = ($revisi_dikerjakan / $total_revisi) * 100;

            $anggota[] = [
                'nama' => $member->members->name,
                'revisi' => $revisi_dikerjakan,
                'revisi_percent' => $revisi_percent,
            ];
        }

        return view('admin.page.student-progress.project.progress-project', compact('project', 'anggota', 'total_progress', 'total_revisi_dont_completed'));
    }

    public function getStudent(request $request)
    {
        $students = $this->student->listStudent($request);
        return view('admin.page.student-progress.student.index',compact('students'));
    }
    public function getStudentProject(Student $student)
    {
        $projects = $this->project->getProjectByStudent($student->id);
        return view('admin.page.student-progress.student.project',Compact('projects','student'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
