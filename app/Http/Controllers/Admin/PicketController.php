<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\NotePicketInterface;
use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Models\Picket;
use App\Models\NotePicket;
use App\Http\Requests\StorePicketRequest;
use App\Http\Requests\UpdatePicketRequest;
use App\Enums\DayEnum;
use Illuminate\Http\Request;

class PicketController extends Controller
{
    private PicketInterface $picket;
    private StudentInterface $student;
    private PicketingReportInterface $report;
    private NotePicketInterface $note;

    public function __construct(PicketInterface $picket, StudentInterface $student, PicketingReportInterface $report, NotePicketInterface $note)
    {
        $this->report = $report;
        $this->student = $student;
        $this->picket = $picket;
        $this->note = $note;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $days = DayEnum::toSelectArray();
        $reports = $this->report->get();
        $students = $this->student->get($request);
        $pickets = $this->picket->get();
        $notes = $this->note->get();
        return view('admin.page.picket.schedule' , compact('pickets','students','reports','notes'));
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
    public function store(StorePicketRequest $request)
    {
        $this->picket->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picket $picket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picket $picket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePicketRequest $request, Picket $picket)
    {
        $this->picket->update($picket->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picket $picket)
    {
        $this->picket->delete($picket->id);
        return back()->with('success' , 'Data Berhasil DiHapus');
    }
}
