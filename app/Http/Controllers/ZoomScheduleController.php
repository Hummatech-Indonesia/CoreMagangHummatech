<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Models\ZoomSchedule;
use App\Http\Requests\StoreZoomScheduleRequest;
use App\Http\Requests\UpdateZoomScheduleRequest;

class ZoomScheduleController extends Controller
{
    private ZoomScheduleInterface $zoomSchedule;

    public function __construct(ZoomScheduleInterface $zoomSchedule)
    {
        $this->zoomSchedule = $zoomSchedule;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zoomSchedules = $this->zoomSchedule->get();
        return view('' , compact('zoomSchedules'));
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
    public function show(ZoomSchedule $zoomSchedule)
    {
        //
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
}
