<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Enum\StatusPresentationEnum;
use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\HummataskTeam;
use App\Models\LimitPresentation;
use App\Models\Mentor;
use App\Models\Project;
use App\Services\PresentationService;
use Carbon;

class PresentationController extends Controller
{
    private PresentationInterface $presentation;
    private LimitPresentationInterface $limits;
    private Project $project;
    private HummataskTeamInterface $hummataskTeam;
    private MentorDivisionInterface $mentorDivision;
    public function __construct(MentorDivisionInterface $mentorDivision, PresentationInterface $presentation, LimitPresentationInterface $limits, PresentationService $service, Project $project, HummataskTeamInterface $hummataskTeam)
    {
        $this->presentation = $presentation;
        $this->limits = $limits;
        $this->project = $project;
        $this->hummataskTeam = $hummataskTeam;
        $this->mentorDivision = $mentorDivision;
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
    public function show(Presentation $presentation)
    {
        $finisheds = $this->presentation->whereStatus(StatusPresentationEnum::FINISH->value);
        $pendings = $this->presentation->whereStatus(StatusPresentationEnum::PENNDING->value);
        $ongoings = $this->presentation->whereStatus(StatusPresentationEnum::ONGOING->value);
        return view('admin.page.presentation.index', compact('finisheds', 'pendings', 'ongoings'));
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
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $data=$request->validated();
        $data['status_presentation']=StatusPresentationEnum::PENNDING->value;
        $this->presentation->update($presentation->id, $data);
        return back()->with('success', 'Data Berhasil Diperbarui');
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
        $slugs = $this->hummataskTeam->slug($slug);
        $limits = $this->limits->first();
        $presentations = [];
        $division = $slugs->student->division_id;

        $mentors = $this->mentorDivision->whereMentorDivision($division);
        foreach ($mentors as $mentor) {
            $presentations = $this->presentation->GetPresentations($mentor->mentor_id);
            // dd($mentor);
        }
        return view('Hummatask.team.presentation', compact('hummataskTeam', 'presentations', 'limits', 'slugs'));
    }
}
