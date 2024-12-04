<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\ProjectRevisionInterface;
use App\Contracts\Repositories\QueuePresentationInterface;
use App\Enum\RevisionStatusEnum;
use App\Models\Presentation;
use App\Models\Project;
use App\StatusProjectEnum;
use App\Models\ProjectRevision;
use App\Services\ProjectService;
use App\Enum\StatusHummaTeamEnum;
use App\Models\QueuePresentation;
use App\Enum\StatusMemberTeamEnum;
use App\Services\HummataskTeamService;
use App\Services\StudentProjectService;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\AddRepositoryRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Http\Requests\StoreProjectFromMentorRequest;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\HummataskTeamMembersInterface;
use App\Enum\TaskStatusEnum;
use http\Env\Response;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
    private QueuePresentationInterface $queuePresentation;
    private ProjectRevisionInterface $projectRevision;

    public function __construct(
        HummataskTeamInterface $hummatask_team,
        HummataskTeamService $service,
        ProjectService $projectService,
        ProjectInterface $project,
        StudentProjectService $studentProjectService,
        StudentProjectInterface $studentProject,
        CategoryProjectInterface $categoryProject,
        StudentInterface $student,
        MentorDivisionInterface $mentordivision,
        StudentTeamInterface $studentTeam,
        MentorStudentInterface $mentorStudent,
        PresentationInterface $presentation,
        HummataskTeamMembersInterface $hummataskMemberPresentation,
        QueuePresentationInterface $queuePresentation,
        ProjectRevisionInterface $projectRevision
    ) {
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
        $this->queuePresentation = $queuePresentation;
        $this->projectRevision = $projectRevision;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryProject = $this->categoryProject->get();
        $students = $this->student->getStudentAccepted()->where('id', '!=', auth()->user()->student_id)->pluck('name', 'id');

         $presentations = $this->presentation->getPresentationsByStudentId(auth()->user()->student_id);
         $totalPresentation = $this->presentation->getPresentationsByStudentId(auth()->user()->student_id)->count();
         $upcomingProject = $this->project->upcomingproject(auth()->user()->student_id);
         $queuePresentation = $this->queuePresentation->getQueueByDivision(auth()->user()->student->division_id)?->queue ?? 1;
         $myQueuePresentation = $this->presentation->getQueuePresentationByUser(auth()->user()->student_id);

        // $pending = $this->project->where('status_project', TaskStatusEnum::PENDING->value)->count();
        // $inprogress = $this->project->where('status_project', TaskStatusEnum::INPROGRESS->value)->count();
        // $revision = $this->project->where('status_project', TaskStatusEnum::REVISION->value)->count();
        // $completed = $this->project->where('status_project', TaskStatusEnum::COMPLETED->value)->count();
        $getProjects = $this->project->get();
        $projects = [];
        foreach ($getProjects as $getProject) {
            $projects[] = [
                ...$getProject->toArray(), // Mengubah objek ke array
                'urutan' => $this->project->getQueueProjectPresentation($getProject->id),
                'revision_count' => $this->project->getProjectRevision($getProject->id)
            ];
        }

        // dd($getProject);
        return view('Hummatask.index', compact('categoryProject', 'students','presentations','queuePresentation','myQueuePresentation','upcomingProject','totalPresentation','projects'));
    }

    public function managementProject()
    {
        $categoryProject = $this->categoryProject->get();
        $students = $this->student->getStudentAccepted()->where('id', '!=', auth()->user()->student_id)->pluck('name', 'id');
        $pending = $this->project->where('status_project', TaskStatusEnum::PENDING->value)->count();
        $inprogress = $this->project->where('status_project', TaskStatusEnum::INPROGRESS->value)->count();
        $revision = $this->project->where('status_project', TaskStatusEnum::REVISION->value)->count();
        $completed = $this->project->where('status_project', TaskStatusEnum::COMPLETED->value)->count();
        $getProjects = $this->project->get();
        $projects = [];
        foreach ($getProjects as $getProject) {
            $projects[] = [
                ...$getProject->toArray(), // Mengubah objek ke array
                'urutan' => $this->project->getQueueProjectPresentation($getProject->id),
                'revision_count' => $this->project->getProjectRevision($getProject->id)
            ];
        }

        return view('Hummatask.management-project', compact('categoryProject', 'students', 'pending', 'inprogress', 'revision', 'completed', 'projects'));
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
        $validated['division_id'] = auth()->user()->student->division_id;
        $project = $this->project->store($validated);
        $members = [];
        $members[] = [
            'project_id' => $project->id,
            'member_id' => auth()->user()->student_id,
            'status' => StatusMemberTeamEnum::Leader->value
        ];
        if (isset($validated['members']) && is_array($validated['members'])) {
            foreach ($validated['members'] as $member) {
                $members[] = [
                    'project_id' => $project->id,
                    'member_id' => $member,
                    'status' => StatusMemberTeamEnum::Member->value
                ];
            }
        }
        $this->hummataskMemberPresentation->store($members);
        //        }
        return back()->with('success', 'project baru berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    public function addRepository(AddRepositoryRequest $request, $slug, Project $project)
    {
        $data = $request->validated();
        $this->project->update($project->id, $data);

        return back()->with('success', 'Berhasil menambahkan link repository');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $slug, Project $project)
    {
        $team = $this->hummatask_team->slug($slug);

        $data = $request->validated();
        $this->project->accProject($project->id, $data, $team->id);
        $data['project_id'] = $project->id;

        $this->hummatask_team->update($team->id, [
            'status' => StatusHummaTeamEnum::ACTIVE->value
        ]);

        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);
        foreach ($studentTeams as $studentTeam) {
            $this->studentTeam->update($studentTeam->id, $data);
        }

        return back()->with('success', 'Berhasil memilih tema');
    }

    public function projectFromMentor(StoreProjectFromMentorRequest $request, $slug)
    {
        $team = $this->hummatask_team->slug($slug);

        $data = $request->validated();
        $project = $this->project->store([
            'hummatask_team_id' => $team->id,
            'title' => $data['custom-project']
        ]);

        $data['project_id'] = $project->id;
        $this->project->accProject($project->id, $data, $team->id);

        $this->hummatask_team->update($team->id, [
            'status' => StatusHummaTeamEnum::ACTIVE->value
        ]);

        $studentTeams = $this->studentTeam->where('hummatask_team_id', $team->id);
        foreach ($studentTeams as $studentTeam) {
            $this->studentTeam->update($studentTeam->id, $data);
        }

        return back()->with('success', 'Berhasil memberikan tema');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $this->project->delete($project->id);
            return to_route('project.task.index')->with('success', value: "Berhasil menghapus project");
        } catch (\Exception $e) {
            return to_route('project.task.index')->with('error', value: 'Gagal menghapus project');
        }
    }

    public function mentor()
    {
        $categoryProjects = $this->categoryProject->get();
        $mentorStudents = $this->mentorStudent->whereMentorStudent(auth()->user()->mentor->id);
        $teams = $this->hummatask_team->WhereTeam();
        $mentors = $this->mentordivision->whereMentor(auth()->user()->mentor->id);
        $acc = $this->project->where('status', StatusProjectEnum::ACCEPTED->value);
        return view('mentor.project-submission.index', compact('categoryProjects', 'mentorStudents', 'teams', 'mentors', 'acc'));
    }

    public function showProjectSubmission($slug)
    {
        $team = $this->hummatask_team->slug($slug);
        $projects = $this->project->where('hummatask_team_id', $team->id);
        $done = $this->project->getProjectAccepted($team->id);
        return view('mentor.project-submission.detail', compact('team', 'projects', 'done'));
    }

    public function detailProject(Project $project)
    {
        $project = $this->project->show($project->id);
        $categoryProject = $this->categoryProject->get();
        $studentsData = $this->student->getStudentAccepted();
        $students = $this->hummataskMemberPresentation->getStudentByPresentation($project->id);
        return view('Hummatask.detail-project', compact('project', 'categoryProject', 'studentsData', 'students'));
    }

    public function presentationProject(Project $project)
    {
        $presentations = $this->presentation->getPresentationByProject($project->id);
        return view('Hummatask.detail-presentation', compact('project', 'presentations'));
    }
    public function revisionProject(Project $project, Presentation $presentation)
    {
        $revisionTodo = $this->projectRevision->getRevisionByPresentation($presentation->id, RevisionStatusEnum::Todo->value);
        $revisionInProgress = $this->projectRevision->getRevisionByPresentation($presentation->id, RevisionStatusEnum::InProgress->value);
        $revisionDone = $this->projectRevision->getRevisionByPresentation($presentation->id, RevisionStatusEnum::Completed->value);
        return view('Hummatask.revision', compact('project', 'presentation','revisionTodo','revisionInProgress','revisionDone'));
    }
    public function changeStatusRevision(Project $project, Presentation $presentation, Request $request)
    {
        // Validasi input
        $request->validate([
            'id_revision' => 'required|exists:project_revisions,id',
            'status' => 'required|string'
        ]);

        try {
            // Cari revision berdasarkan ID
            $revision = ProjectRevision::findOrFail($request->id_revision);

            // Update status
            $revision->status = $request->status;
            $revision->save();

            // Kembalikan response sukses
            return response()->json([
                'message' => 'Status updated successfully.',
                'data' => $revision
            ], 200);

        } catch (\Exception $e) {
            // Tangani error
            return response()->json([
                'message' => 'Failed to update status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function storePresentation(StorePresentationRequest $request)
    {
        try {
            $this->presentation->store($request->validated());
            return redirect()->route('student-offline.project.presentation', parameters: $request->project_id)->with('success', 'Berhasil menambahkan jadwal presentasi');
        } catch (\Exception $e) {
            return redirect()->route('student-offline.project.presentation', parameters: $request->project_id)->with('error', value: 'Gagal menambahkan jadwal presentasi');
        }

    }

    public function addRevision(Project $project, Presentation $presentation, Request $request)
    {
        $validated = $request->validate([
            'revision' => 'required',
            'status' => 'required|string'
        ]);
        try{
            $validated['presentation_id'] = $presentation->id;
            $this->projectRevision->store($validated);
            return to_route('student-offline.project.presentation.revision', ['project' => $presentation->project->id,'presentation' => $presentation->id])->with('success', value: "Berhasil menambah revisi");
        }catch (\Exception $e) {
            return to_route('student-offline.project.presentation.revision', ['project' => $presentation->project->id,'presentation' => $presentation->id])->with('error', value: "Gagal menambah revisi");
        }
    }
}
