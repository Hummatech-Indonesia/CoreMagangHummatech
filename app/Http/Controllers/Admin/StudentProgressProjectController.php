<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\ProjectInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentProgressProjectController extends Controller
{
    private ProjectInterface $project;

    public function __construct(
        ProjectInterface $project
    ) {
        $this->project = $project;
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
        return view('admin.page.student-progress.project.progress-project', compact('project'));
    }

    public function getStudent()
    {
        return view('admin.page.student-progress.student.index');
    }
    public function getStudentProject()
    {
        return view('admin.page.student-progress.student.project');
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
