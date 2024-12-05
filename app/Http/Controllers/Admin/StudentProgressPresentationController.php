<?php

namespace App\Http\Controllers\Admin;

use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ProjectInterface;

class StudentProgressPresentationController extends Controller
{

    private ProjectInterface $project;
    private PresentationInterface $presentations;
    public function __construct(
        ProjectInterface $project,
        PresentationInterface $presentation
    )
    {
        $this->project = $project;
        $this->presentations = $presentation;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->get('date');
        $status = $request->get('status');
        $search = $request->get('search');

        $presentationsToday = $this->presentations->get();
        $presentations = $this->presentations->getPresentationWithMembers($status, $date, $search);
        $unpresentedProject = $this->presentations->getUnpresentedProject();
        return view('admin.page.student-progress.presentation.index', compact('presentationsToday','presentations','unpresentedProject'));
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
    public function show(int $presentation)
    {
        $presentation_projects = Presentation::findOrFail($presentation);
        return view('admin.page.student-progress.presentation.detail',compact('presentation_projects'));
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
