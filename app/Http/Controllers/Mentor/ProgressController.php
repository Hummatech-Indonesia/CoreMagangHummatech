<?php

namespace App\Http\Controllers\Mentor;

use App\Models\Project;
use Illuminate\Http\Request;
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
        $project->load([
            'members.members',
            'presentation.revision.assignedStudent'
        ]);

        $total_revisi = $project->presentation->revision->count();

        if ($total_revisi == 0) {
            $total_progress = 0;
            $anggota = []; 
            return view('mentor.progress.progress-project.detail-progress', compact('project', 'anggota', 'total_revisi', 'total_progress'));
        }

        $anggota = [];
        $total_revisi_dikerjakan = 0;
        $total_revisi_terassign = 0;

        foreach ($project->members as $member) {
            $revisi_dikerjakan = $project->presentation->revision->filter(function ($revision) use ($member) {
                return $revision->assignedStudent->contains('id', $member->members->id);
            })->count();

            $total_revisi_terassign += $revisi_dikerjakan;

            $revisi_percent = $total_revisi > 0 ? min(($revisi_dikerjakan / $total_revisi) * 100, 100) : 0;

            $anggota[] = [
                'nama' => $member->members->name,
                'revisi' => $revisi_dikerjakan,
                'revisi_percent' => $revisi_percent,
            ];
        }

        $total_progress = $total_revisi > 0 ? min(($total_revisi_terassign / $total_revisi) * 100, 100) : 0;

        return view('mentor.progress.progress-project.detail-progress', compact('project', 'anggota', 'total_revisi', 'total_progress'));
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
