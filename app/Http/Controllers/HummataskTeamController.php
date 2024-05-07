<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Models\HummataskTeam;
use App\Http\Requests;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Http\Requests\UpdateHummataskTeamRequest;
use App\Models\MentorStudent;
use App\Services\HummataskTeamService;
use App\Services\ProjectService;
use App\Services\StudentProjectService;
use App\StatusProjectEnum;
use Carbon;
use Illuminate\Http\Request;

class HummataskTeamController extends Controller
{
    private HummataskTeamService $service;
    private HummataskTeamInterface $hummatask_team;
    private ProjectService $projectService;
    private ProjectInterface $project;
    private StudentProjectService $studentProjectService;
    private MentorDivisionInterface $mentordivision;
    private StudentProjectInterface $studentProject;
    private CategoryProjectInterface $categoryProject;
    private StudentInterface $student;
    private StudentTeamInterface $studentTeam;
    private MentorStudentInterface $mentorStudent;

    public function __construct(
        HummataskTeamInterface $hummatask_team, HummataskTeamService $service,
        ProjectService $projectService, ProjectInterface $project,
        StudentProjectService $studentProjectService, StudentProjectInterface $studentProject,
        CategoryProjectInterface $categoryProject,
        StudentInterface $student,
        MentorDivisionInterface $mentordivision,
        StudentTeamInterface $studentTeam,
        MentorStudentInterface $mentorStudent
        )
    {
        $this->hummatask_team = $hummatask_team;
        $this->service = $service;
        $this->mentordivision = $mentordivision;
        $this->projectService = $projectService;
        $this->project = $project;
        $this->studentProjectService = $studentProjectService;
        $this->studentProject = $studentProject;
        $this->categoryProject = $categoryProject;
        $this->student = $student;
        $this->studentTeam = $studentTeam;
        $this->mentorStudent = $mentorStudent;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->studentProject->where('student_id', auth()->user()->student->id);
        return view('Hummatask.index', compact('projects'));
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
    public function store(StoreHummataskTeamRequest $request)
    {
        $data = $this->service->storeTim($request);
        $mentors  = $this->mentordivision->whereMentor(auth()->user()->mentor->id);
        $data['division_id'] = $mentors[0]->division_id;
        $hummatask_team = $this->hummatask_team->store($data);
        foreach ($request->student_id as $student_id) {
            $this->studentTeam->store([
                'hummatask_team_id' => $hummatask_team->id,
                'student_id' => $student_id,
            ]);
        }

        return back()->with('success', 'Team baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, HummataskTeam $hummataskTeam)
    {
        $slugs = $this->hummatask_team->slug($slug);
        $projects = $this->project->where('title', $slugs->slug);
        $studentProjects = [];

        foreach ($projects as $project) {
            $studentProjects = $this->studentProject->where('project_id', $project->id);
        }
        return view('Hummatask.team.index', compact('hummataskTeam', 'studentProjects', 'slugs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HummataskTeam $hummataskTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHummataskTeamRequest $request, HummataskTeam $hummataskTeam)
    {
        $data = $this->service->update($hummataskTeam, $request->validated());
        $this->hummatask_team->update($hummataskTeam->id, $data);
        return back()->with('success', 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HummataskTeam $hummataskTeam)
    {
        $this->hummatask_team->delete($hummataskTeam->id);
        return back()->with('success', 'Berhasi Menghapus Data');
    }

    public function soloTeam(Request $request){
        $data = $this->service->store($request);
        $data['student_id'] = auth()->user()->student->id;
        $data['division_id'] = auth()->user()->student->division_id;
        $data['slug'] = $request->name;
        $team = $this->hummatask_team->store($data);

        $projectVar['hummatask_team_id'] = $team->id;
        $projectVar['title'] = $team->name;
        $projectVar['description'] = $team->description;
        $projectVar['status'] = StatusProjectEnum::ACCEPTED->value;
        $projectVar['start_date'] = Carbon::now()->toDateString();
        $projectVar['end_date'] = Carbon::now()->addWeek()->toDateString();
        $project = $this->project->store($projectVar);

        $studentProjectVar['project_id'] = $project->id;
        $studentProjectVar['student_id'] = auth()->user()->student->id;
        $this->studentProject->store($studentProjectVar);

        return back()->with('success', 'Team solo project berhasil ditambahkan');
    }

    public  function mentor(){
        $categoryProjects = $this->categoryProject->get();
        $students = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $teams = $this->hummatask_team->WhereTeam();
        $mentors  = $this->mentordivision->whereMentor(auth()->user()->mentor->id);
        return view('mentor.team.index', compact('categoryProjects', 'students', 'teams' ,'mentors'));
    }
}
