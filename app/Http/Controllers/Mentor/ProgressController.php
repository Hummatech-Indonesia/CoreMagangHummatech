<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\ProjectInterface;



class ProgressController extends Controller
{

    private ProjectInterface $project;
    private Project $projects;


    public function __construct(ProjectInterface $projectInterface)
    {
        $this->project = $projectInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function projectSiswa()
    {
        return view('mentor.progress.project-siswa.index');
    }
    public function projectGroupSiswa()
    {
        return view('mentor.progress.project-siswa.project-group');
    }
    public function detailProgressSiswa()
    {
        return view('mentor.progress.project-siswa.detail-progress');
    }

    public function progressProject()
    {
        $projects = $this->project->getAcceptedProject();

        return view('mentor.progress.progress-project.index', compact('projects'));
    }
    public function detailprogressProject(Project $project)
    {
        $project->load('members.members')->load('presentation.revision');
        return view('mentor.progress.progress-project.detail-progress', compact('project'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
