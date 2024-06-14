<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Enum\StatusPresentationEnum;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCallbackRequest;
use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\SubmitPresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Http\Resources\HummataskTeamResource;
use App\Http\Resources\PresentationResource;
use App\Models\HummataskTeam;
use App\Models\Project;
use App\Services\PresentationService;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    private PresentationInterface $presentation;
    private LimitPresentationInterface $limits;
    private Project $project;
    private HummataskTeamInterface $hummataskTeam;
    private MentorDivisionInterface $mentorDivision;
    private CategoryProjectInterface $categoryProject;
    public function __construct(MentorDivisionInterface $mentorDivision, PresentationInterface $presentation, LimitPresentationInterface $limits, PresentationService $service, Project $project, HummataskTeamInterface $hummataskTeam, CategoryProjectInterface $categoryProject)
    {
        $this->presentation = $presentation;
        $this->limits = $limits;
        $this->project = $project;
        $this->hummataskTeam = $hummataskTeam;
        $this->mentorDivision = $mentorDivision;
        $this->categoryProject = $categoryProject;
    }

    /**
     * schedule
     *
     * @return JsonResponse
     */
    public function schedule(Request $request): JsonResponse
    {
        $request->merge(['division_id' => auth()->user()->student->division_id]);
        $presentations = $this->presentation->getByDivision($request);
        return ResponseHelper::success(PresentationResource::collection($presentations));
    }

    /**
     * history
     *
     * @param  mixed $hummataskTeam
     * @return JsonResponse
     */
    public function history(HummataskTeam $hummataskTeam): JsonResponse
    {
        $histories = $this->presentation->getByTeam($hummataskTeam->id);
        return ResponseHelper::success(PresentationResource::collection($histories));
    }

    /**
     * submitPresentation
     *
     * @param  mixed $request
     * @param  mixed $hummataskTeam
     * @param  mixed $presentation
     * @return JsonResponse
     */
    public function submitPresentation(SubmitPresentationRequest $request, HummataskTeam $hummataskTeam, Presentation $presentation): JsonResponse
    {
        $oldPresentation = $this->presentation->getByTeamToday($hummataskTeam->id);
        if ($oldPresentation != null) {
            $this->presentation->update($oldPresentation->id, [
                'hummatask_team_id' => null,
                'status_presentation' => null,
                'title' => null,
            ]);
        }

        $data = $request->validated();
        $data['hummatask_team_id'] = $hummataskTeam->id;
        $data['status_presentation'] = StatusPresentationEnum::PENNDING->value;
        $this->presentation->update($presentation->id, $data);
        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * submitPresentationByRfid
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function submitPresentationByRfid(Request $request): JsonResponse
    {
        $rfid = $request->rfid;
        if ($team = $this->hummataskTeam->getTeamByRfidLeader($rfid)) {
            $myTeam = $team;
        } else if ($team = $this->hummataskTeam->getTeamByRfidMember($rfid)) {
            $myTeam = $team;
        }
        else {
            return ResponseHelper::error(null, "Tim tidak ditemukan");
        }

        if ($myPresentation = $this->presentation->getByTeamToday($myTeam->id)) {
            if ($myPresentation->status == StatusPresentationEnum::PENNDING->value || $myPresentation->status == null) {
                $this->presentation->update($myPresentation->id, ['status_presentation' => StatusPresentationEnum::ONGOING->value]);
            }
            else if ($myPresentation->status == StatusPresentationEnum::ONGOING->value) {
                $this->presentation->update($myPresentation->id, ['status_presentation' => StatusPresentationEnum::FINISH->value]);
            }
            else if ($myPresentation->status == StatusPresentationEnum::FINISH->value) {
                return ResponseHelper::error(null, "Anda sudah selesai presentasi");
            }
            else {
                return ResponseHelper::error(null, "Anda tidak selesai presentasi");
            }
            return ResponseHelper::success(HummataskTeamResource::make($myTeam), "Berhasil presentasi");
        } else {
            return ResponseHelper::error(null, "Belum ada presentasi yang anda ajukan!");
        }
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
    public function mentorshow()
    {
        $limits = $this->limits->get();
        $presentations = $this->presentation->GetToday();
        return view('mentor.presentation.index', compact('limits', 'presentations'));
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

        $i = 0;
        $this->presentation->deleteAll();
        foreach ($request->start_date as $start) {
            $this->presentation->store([
                'mentor_id' => $request['mentor_id'],
                'schedule_to' => $request['schedule_to'][$i],
                'start_date' => $start,
                'end_date' => $request['end_date'][$i],
            ]);
            $i++;
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan jadwal presentasi');
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

        if ($presentation->hummatask_team_id && $presentation->hummatask_team_id !== $teamId) {
            return back()->with('error', 'Jadwal sudah dipilih oleh tim lain');
        }

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
        return response()->json([
            'schedule-presentations' => $presentations,
            'histories' => $histories
        ]);
    }


    public function callback(StoreCallbackRequest $request, Presentation $presentation)
    {
        $data = $request->validated();
        $this->presentation->update($presentation->id, $data);
        return back()->with('success', 'Berhasil memberi tanggapan');
    }
}
