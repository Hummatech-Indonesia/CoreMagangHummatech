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
        return view('admin.page.student-progress.project.index', compact('projects'));
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

    /**
     * Show the form for editing the specified resource.
     */
    public function revision(Project $project)
    {
        $revisions = $this->project->getProjectWithRevision($project->id);
        return view('admin.page.student-progress.project.revision', compact('project', 'revisions'));
    }

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
