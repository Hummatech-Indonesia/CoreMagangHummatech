<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\HummataskTeamMembersInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Enum\StatusHummaTeamEnum;
use App\Enum\StatusMemberTeamEnum;
use App\Models\HummataskTeam;
use App\Models\Presentation;
use App\Http\Requests;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Http\Requests\StoreSoloProjectRequest;
use App\Http\Requests\UpdateHummataskTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\MentorStudent;
use App\Services\HummataskTeamService;
use App\Services\ProjectService;
use App\Services\StudentProjectService;
use App\StatusProjectEnum;
use Carbon;
use Illuminate\Http\Request;
use Str;

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
    private PresentationInterface $presentation;
    private HummataskTeamMembersInterface $hummataskMemberPresentation;

    public function __construct(
        HummataskTeamInterface        $hummatask_team, HummataskTeamService $service,
        ProjectService                $projectService, ProjectInterface $project,
        StudentProjectService         $studentProjectService, StudentProjectInterface $studentProject,
        CategoryProjectInterface      $categoryProject,
        StudentInterface              $student,
        MentorDivisionInterface       $mentordivision,
        StudentTeamInterface          $studentTeam,
        MentorStudentInterface        $mentorStudent,
        PresentationInterface         $presentation,
        HummataskTeamMembersInterface $hummataskMemberPresentation
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
        $this->presentation = $presentation;
        $this->hummataskMemberPresentation = $hummataskMemberPresentation;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryProject = $this->categoryProject->get();
        $students = $this->student->getStudentAccepted()->pluck('name', 'id');
        $presentations = $this->presentation->getPresentationsByStudentId(auth()->user()->id);
        return view('Hummatask.index', compact('categoryProject', 'students', 'presentations'));
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
        $validated = $request->validated();
        $presentation = $this->presentation->store($validated);
//        if ($validated['members'] && is_array($validated['members'])){
        $members = [];
        $members[] = [
            'presentation_id' => $presentation->id,
            'member_id' => auth()->user()->id,
            'status' => StatusMemberTeamEnum::Leader->value
        ];
        if (isset($validated['members']) && is_array($validated['members'])){
            foreach ($validated['members'] as $member) {
                $members[] = [
                    'presentation_id' => $presentation->id,
                    'member_id' => $member,
                    'status' => StatusMemberTeamEnum::Member->value
                ];
            }
        }
        $this->hummataskMemberPresentation->store($members);
//        }
        return back()->with('success', 'Team baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, HummataskTeam $hummataskTeam)
    {
        $team = $this->hummatask_team->slug($slug);
        $projects = $this->project->where('hummatask_team_id', $team->id);
        $activeProject = $this->project->getProjectAccepted($team->id);
        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);
        return view('Hummatask.team.index', compact('team', 'projects', 'activeProject', 'studentTeams'));
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
        $data = $request->validated();
        $this->hummatask_team->update($hummataskTeam->id, ['name' => $data['name'], 'student_id' => $data['leader'], 'status' => $data['status']]);
        $project = $this->project->getProjectAccepted($hummataskTeam->id);

        if ($data['status'] == StatusHummaTeamEnum::SUCCESS->value) {
            $this->project->update($project->id, ['end_date' => $data['end_date'], 'status' => $data['status']]);
        } else {
            $this->project->update($project->id, ['end_date' => $data['end_date']]);
        }

        $this->studentTeam->deleteByTeamId($hummataskTeam->id);
        if ($request->has('deadline')) $this->project->updateByTeamId($hummataskTeam->id, ['end_date' => $data['deadline']]);
        foreach ($request->student_id as $student_id) {
            $this->studentTeam->store([
                'hummatask_team_id' => $hummataskTeam->id,
                'student_id' => $student_id,
            ]);
        }
        return to_route('mentor.team-detail', $hummataskTeam->slug)->with('success', 'Berhasil Memperbarui Data Team');
    }

    public function updateOnStudent(UpdateTeamRequest $request, HummataskTeam $hummataskTeam)
    {
        $data = $this->service->update($hummataskTeam, $request);
        $this->hummatask_team->update($hummataskTeam->id, $data);
        $project = $this->project->getProjectAccepted($hummataskTeam->id);
        $this->project->update($project->id, $data);

        return back()->with('success', 'Berhasil Mengedit Tim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        try {
            $this->presentation->delete($presentation->id);
            return back()->with('success', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            return back()->with('warning', 'Gagal Menghapus Data, ' . $th->getMessage());
        }
    }

    public function soloTeam(StoreSoloProjectRequest $request)
    {
        $data = $this->service->store($request);
        $data['student_id'] = auth()->user()->student->id;
        $data['division_id'] = auth()->user()->student->division_id;
        $data['slug'] = Str::slug($request->name);
        $data['status'] = StatusHummaTeamEnum::ACTIVE->value;
        $team = $this->hummatask_team->store($data);

        $projectVar['hummatask_team_id'] = $team->id;
        $projectVar['title'] = $team->name;
        $projectVar['description'] = $team->description;
        $projectVar['status'] = StatusProjectEnum::ACCEPTED->value;
        $projectVar['start_date'] = Carbon::now()->toDateString();
        $projectVar['end_date'] = Carbon::now()->addWeek()->toDateString();
        $project = $this->project->store($projectVar);

        $studentTeamVar['project_id'] = $project->id;
        $studentTeamVar['hummatask_team_id'] = $team->id;
        $studentTeamVar['student_id'] = auth()->user()->student->id;
        $this->studentTeam->store($studentTeamVar);

        return back()->with('success', 'Team solo project berhasil ditambahkan');
    }

    public function mentor()
    {
        $categoryProjects = $this->categoryProject->get();
        $mentorStudents = $this->mentorStudent->getBymentor(auth()->user()->mentor->id);
        $teams = $this->hummatask_team->WhereTeam();
        $mentors = $this->mentordivision->whereMentor(auth()->user()->mentor->id);
        // dd($mentorStudents);
        return view('mentor.team.index', compact('categoryProjects', 'mentorStudents', 'teams', 'mentors'));
    }

    public function mentorShow($slug)
    {
        $team = $this->hummatask_team->slug($slug);
        $categoryProjects = $this->categoryProject->get();
        $students = $this->mentorStudent->getBymentor(auth()->user()->mentor->id);
        $mentors = $this->mentordivision->whereMentor(auth()->user()->mentor->id);
        $done = $this->project->getProjectAccepted($team->id);
        $presentationHistories = $this->presentation->where('hummatask_team_id', $team->id);
        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);
        $project = $this->project->getProjectAccepted($team->id);
        return view('mentor.team.detail', compact('team', 'done', 'categoryProjects', 'students', 'mentors', 'presentationHistories', 'studentTeams', 'project'));
    }

    public function mentorEdit($slug)
    {
        $team = $this->hummatask_team->slug($slug);
        $categoryProjects = $this->categoryProject->get();
        $students = $this->mentorStudent->getBymentor(auth()->user()->mentor->id);
        $project = $this->project->getProjectAccepted($team->id);
        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);

        // dd($team);
        return view('mentor.team.edit', compact('team', 'categoryProjects', 'students', 'project', 'studentTeams'));
    }
}
