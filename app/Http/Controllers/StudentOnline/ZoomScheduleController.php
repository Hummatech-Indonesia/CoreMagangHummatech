<?php

namespace App\Http\Controllers\StudentOnline;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Http\Controllers\Controller;
use App\Models\ZoomSchedule;
use App\Http\Requests\StoreZoomScheduleRequest;
use App\Http\Requests\UpdateZoomScheduleRequest;
use App\Models\Presentation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ZoomScheduleController extends Controller
{
    private ZoomScheduleInterface $zoomSchedule;
    private HummataskTeamInterface $hummataskTeam;
    private PresentationInterface $presentation;

    public function __construct(ZoomScheduleInterface $zoomSchedule, HummataskTeamInterface $hummataskTeam, PresentationInterface $presentation)
    {
        $this->zoomSchedule = $zoomSchedule;
        $this->hummataskTeam = $hummataskTeam;
        $this->presentation = $presentation;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $zoomSchedules = $this->zoomSchedule->paginate(9);
        $zoomSchedules = $this->zoomSchedule->search($request)->paginate(9);
        return view('admin.page.zoom-schedules.index' , compact('zoomSchedules'));
    }

    public function indexStudent()
    {
        $zoomSchedules = $this->zoomSchedule->get();
        return view('student_online.meeting.index', compact('zoomSchedules'));
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
    public function store(StoreZoomScheduleRequest $request)
    {
        $this->zoomSchedule->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ZoomSchedule $zoomSchedule, Request $request)
    {
        $zoomSchedules = $this->zoomSchedule->get();

        $processedSchedules = [];

        if ($zoomSchedules->isNotEmpty()) {
            foreach ($zoomSchedules as $schedule) {
                $startDate = \Carbon\Carbon::parse($schedule->start_date);
                $endDate = \Carbon\Carbon::parse($schedule->end_date);
                $now = \Carbon\Carbon::now();
                $status = '';

                if ($now->lt($startDate)) {
                    $status = 'Mendatang';
                } elseif ($now->gt($endDate)) {
                    $status = 'Berakhir';
                } else {
                    $status = 'Berlangsung';
                }

                $schedule->status = $status;
                $processedSchedules[] = $schedule;
            }
        }

        $presentations = $this->presentation->GetPresentationByMentor(auth()->user()->mentor->division_id, $request);
        // dd($presentations);

        return view('mentor.zoomschedule', compact('processedSchedules', 'presentations'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZoomSchedule $zoomSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateZoomScheduleRequest $request, ZoomSchedule $zoomSchedule)
    {
        $this->zoomSchedule->update($zoomSchedule->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZoomSchedule $zoomSchedule)
    {
        $this->zoomSchedule->delete($zoomSchedule->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }

//     private function processSchedules($schedules)
// {
//     $processedSchedules = [];

//     foreach ($schedules as $schedule) {
//         $startDate = Carbon::parse($schedule->start_date);
//         $endDate = Carbon::parse($schedule->end_date);
//         $now = Carbon::now();
//         $status = '';

//         if ($now->isSameDay($startDate)) {
//             if ($now->lt($startDate)) {
//                 $status = 'Mendatang';
//             } elseif ($now->gt($endDate)) {
//                 $status = 'Berakhir';
//             } else {
//                 $status = 'Berlangsung';
//             }
//         }

//         if ($status) {
//             $schedule->status = $status;
//             $processedSchedules[] = $schedule;
//         }
//     }

//     return $processedSchedules;
// }
}
