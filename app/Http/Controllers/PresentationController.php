<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Mentor;
use App\Models\Project;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Models\HummataskTeam;
use Illuminate\Support\Carbon;
use App\Models\LimitPresentation;
use App\Models\QueuePresentation;
use App\Enum\StatusPresentationEnum;
use App\Services\PresentationService;
use App\Http\Requests\StoreCallbackRequest;
use App\Enum\StatusCategoryPresentationEnum;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\StatusPresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Contracts\Repositories\QueuePresentationInterface;

class PresentationController extends Controller
{
    private PresentationInterface $presentation;
    private LimitPresentationInterface $limits;
    private Project $project;
    private Presentation $presentationModel;
    private HummataskTeamInterface $hummataskTeam;
    private MentorDivisionInterface $mentorDivision;
    private CategoryProjectInterface $categoryProject;
    private QueuePresentationInterface $queuePresentation;
    public function __construct(MentorDivisionInterface $mentorDivision, PresentationInterface $presentation, LimitPresentationInterface $limits, PresentationService $service, Project $project, HummataskTeamInterface $hummataskTeam, CategoryProjectInterface $categoryProject, QueuePresentationInterface $queuePresentation, Presentation $presentationModel )
    {
        $this->presentation = $presentation;
        $this->limits = $limits;
        $this->project = $project;
        $this->presentationModel = $presentationModel;
        $this->hummataskTeam = $hummataskTeam;
        $this->mentorDivision = $mentorDivision;
        $this->categoryProject = $categoryProject;
        $this->queuePresentation = $queuePresentation;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finisheds = $this->presentation->whereStatus(StatusPresentationEnum::FINISH->value);
        $pendings = $this->presentation->whereStatus(StatusPresentationEnum::PENNDING->value);
        $ongoings = $this->presentation->whereStatus(StatusPresentationEnum::ONGOING->value);
        $limits = $this->limits->first();
        return view('admin.page.offline-students.presentation.index', compact('finisheds', 'pendings', 'ongoings', 'limits'));
    }

    public function getMentorOfflinePresentations(Request $request)
    {
        $date = Carbon::today();
        $limits = $this->limits->get();
        $waitings = $this->presentation->getPresentationByStatus(StatusPresentationEnum::WAITING->value, StatusCategoryPresentationEnum::OFFLINE->value, $date)
            ->merge($this->presentation->getPresentationByStatus(StatusPresentationEnum::PENNDING->value, StatusCategoryPresentationEnum::OFFLINE->value, $date));
        $rejected = $this->presentation->getPresentationByStatus(StatusPresentationEnum::NOTFINISH->value, StatusCategoryPresentationEnum::OFFLINE->value, $date);
        $ongoings = $this->presentation->getPresentationByStatus(StatusPresentationEnum::ONGOING->value,  StatusCategoryPresentationEnum::OFFLINE->value, $date);
        $finisheds = $this->presentation->getPresentationByStatus(StatusPresentationEnum::FINISH->value,  StatusCategoryPresentationEnum::OFFLINE->value, $date);


        $date = $request->get('date');
        $status = $request->get('status');
        $search = $request->get('search');

        $presentations = $this->presentation->getPresentationWithMembers($status,StatusCategoryPresentationEnum::OFFLINE->value,  $date, $search);

        // dd($presentations);

        return view('mentor.presentation.offline.index', compact('limits', 'waitings', 'rejected', 'ongoings', 'presentations','finisheds'));
    }

    public function getMentorOnlinePresentations(Request $request)
    {
        $date = Carbon::today();
        $limits = $this->limits->get();
        $waitings = $this->presentation->getPresentationByStatus(StatusPresentationEnum::WAITING->value, StatusCategoryPresentationEnum::ONLINE->value, $date)
            ->merge($this->presentation->getPresentationByStatus(StatusPresentationEnum::PENNDING->value, StatusCategoryPresentationEnum::ONLINE->value, $date));
        $rejected = $this->presentation->getPresentationByStatus(StatusPresentationEnum::NOTFINISH->value, StatusCategoryPresentationEnum::ONLINE->value, $date);
        $ongoings = $this->presentation->getPresentationByStatus(StatusPresentationEnum::ONGOING->value, StatusCategoryPresentationEnum::ONLINE->value, $date);
        $finisheds = $this->presentation->getPresentationByStatus(StatusPresentationEnum::FINISH->value, StatusCategoryPresentationEnum::ONLINE->value, $date);


        $date = $request->get('date');
        $status = $request->get('status');
        $search = $request->get('search');

        $presentations = $this->presentation->getPresentationWithMembers($status, StatusCategoryPresentationEnum::ONLINE->value, $date, $search);

        // dd($presentations);

        return view('mentor.presentation.online.index', compact('limits', 'waitings', 'rejected', 'ongoings', 'presentations','finisheds'));
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
    // public function store(StorePresentationRequest $request)
    // {
    //     $this->presentation->store($request->validated());
    //     return back()->with('success' , 'Data Berhasil Ditambahkan');
    // }

    public function store(StorePresentationRequest $request)
    {
        dd($request->all());
        $this->presentation->store($request->validated());
        return redirect()->route('project.presentation',$request->id)->with('success', 'Berhasil menambahkan jadwal presentasi');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Presentation $presentation)
    // {
    //     $categoryProject = $this->categoryProject->get();
    //     $presentations = $this->presentation->getByHummataskTeamId();

    //     $teamId = 1; // Ganti dengan ID tim yang Anda inginkan
    //     $monthlyPresentationCount = $this->presentation->countMonthlyPresentationsByTeamId($teamId);

    //     return view('admin.page.presentation.index', compact('categoryProject', 'presentations', 'monthlyPresentationCount'));
    // }

    public function show(Request $request)
    {
        $categoryProject = $this->categoryProject->get();
        $presentations = $this->presentation->getByHummataskTeamId();

        $teamId = 1;
        $monthlyPresentationCount = $this->presentation->countMonthlyPresentationsByTeamId($teamId);

        $studentId = 1;
        $studentPresentationCount = $this->presentation->getMonthlyPresentationsByStudentId($studentId);
        // dd($studentPresentationCount);
        if (is_null($studentPresentationCount)) {
            $studentsTeam = [];
        }


        return view('admin.page.presentation.index', compact('categoryProject', 'presentations', 'monthlyPresentationCount', 'studentPresentationCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentationRequest $request, string $id, Presentation $presentation)
    {
        $teamId = $id;

        $oldPresentation = Presentation::where('hummatask_team_id', $teamId)->first();
        $updateSuccess = false;

        if ($presentation->hummatask_team_id && $presentation->hummatask_team_id !== $teamId) return back()->with('error', 'Jadwal sudah dipilih oleh tim lain');

        $data = $request->validated();
        $data['hummatask_team_id'] = $teamId;
        $data['status_presentation'] = StatusPresentationEnum::PENNDING;

        DB::beginTransaction();

        try {
            if ($oldPresentation) {
                $oldPresentation->hummatask_team_id = null;
                $oldPresentation->status_presentation = null;
                $oldPresentation->title = null;
                $oldPresentation->save();
            }

            $presentation->update($data);
            $updateSuccess = true;
            DB::commit();

            return back()->with('success', 'Data Berhasil Diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal memperbarui data');
        }
    }


    /**
     *
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        $this->presentation->delete($presentation->id);
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function usershow($slug, HummataskTeam $hummataskTeam)
    {
        $team = $this->hummataskTeam->slug($slug);
        $limits = $this->limits->first();
        $presentations = [];
        $division = auth()->user()->student->division_id;

        $mentors = $this->mentorDivision->whereMentorDivision($division);
        foreach ($mentors as $mentor) {
            $presentations[] = $this->presentation->GetPresentations($mentor->mentor_id);
        }

        $presentations = collect($presentations)->flatten();

        $histories = $this->presentation->getPresentationsByTeam($team->id);

        return view('Hummatask.team.presentation', compact('hummataskTeam', 'presentations', 'limits', 'team', 'histories'));
    }


    public function callback(StoreCallbackRequest $request, Presentation $presentation)
    {
        $data = $request->validated();
        $this->presentation->update($presentation->id, $data);
        return back()->with('success', 'Berhasil memberi tanggapan');
    }

    public function changeStatus(StatusPresentationRequest $request)
    {
        $data = $request->validated();
        $presentation = Presentation::find($data['presentation_id']);

        if (!$presentation) {
            return back()->with('error', 'Data presentasi tidak ditemukan');
        }

        \Illuminate\Support\Facades\DB::transaction(function () use ($presentation, $data) {
            // Update status_presentation terlebih dahulu
            $presentation->update([
                'status_presentation' => $data['status_presentation'],
                'reason' => $data['reason'] ?? null,
                'mentor_id' => auth()->user()->id,
                'link_online_presentation' => $data['link_online_presentation'] ?? '-',
                'planning_date_presentation' => $data['planning_date_presentation']
            ]);


            if ($data['status_presentation'] == StatusPresentationEnum::ONGOING->value) {
                // Hitung max urutan, jika tidak ada maka mulai dari 1
                $maxUrutan = Presentation::query()
                    ->where('planning_date_presentation', Carbon::today())
                    ->max('urutan') ?? 0;
                $presentation->update([
                    'urutan' => $maxUrutan + 1
                ]);

                // Update queue dalam QueuePresentation
                $queuePresentation = QueuePresentation::first();
                if ($queuePresentation && $queuePresentation->queue == 0) {
                    $queuePresentation->update([
                        'queue' => $queuePresentation->queue + 1
                    ]);
                }
            }
        });

        return back()->with('success', value: 'Berhasil merubah status');

    }

    public function presentationDone(Request $request, Presentation $presentation)
    {
        try{
            $project = $this->project->find($request->project_id);
            $currentQueue = $this->queuePresentation->getQueueByDivision($project->division_id);
            $findNextQueue = $this->presentationModel
                ->where('urutan', $currentQueue->queue + 1)
                ->where('status_presentation', StatusPresentationEnum::FINISH->value)
                ->where('id', '>', $presentation->id)
                ->first();

            $updatedQueue = $currentQueue->queue;

            if($request->queue >= $currentQueue->queue){
                $updatedQueue = $currentQueue->queue + 1;
            }elseif ($findNextQueue){
                $updatedQueue = $currentQueue->queue + 1 + ($findNextQueue->urutan - $currentQueue->queue);
            }

            $this->queuePresentation->update($currentQueue->id, [
                'queue' => $updatedQueue
            ]);
            $presentation->update([
                'status_presentation' => StatusPresentationEnum::FINISH->value
            ]);
            return back()->with('success', value: 'Berhasil merubah status');
        }catch (\Exception $e){
            return back()->with('error',  value: 'Gagal merubah status');
        }

    }
}
