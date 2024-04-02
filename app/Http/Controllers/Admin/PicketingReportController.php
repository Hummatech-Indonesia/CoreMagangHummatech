<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\PicketingReportInterface;
use App\Http\Controllers\Controller;
use App\Models\PicketingReport;
use App\Http\Requests\StorePicketingReportRequest;
use App\Http\Requests\UpdatePicketingReportRequest;
use App\Services\PicketingReportService;

class PicketingReportController extends Controller
{
    private PicketingReportInterface $picketingReport;
    private PicketingReportService $service;

    public function __construct(PicketingReportInterface $picketingReport, PicketingReportService $service)
    {
        $this->picketingReport = $picketingReport;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $picketingReport = $this->picketingReport->get();
        return view('' , compact('picketingReport'));
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
    public function store(StorePicketingReportRequest $request)
    {
        $data = $this->service->store($request);
        $data['user_id'] = auth()->user()->id;
        $this->picketingReport->store($data);
        return redirect()->back()->with('success', 'Berhasil mengirim lapoan piket.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PicketingReport $picketingReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PicketingReport $picketingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePicketingReportRequest $request, PicketingReport $picketingReport)
    {
        $this->picketingReport->update($picketingReport->id, $request->validated());
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PicketingReport $picketingReport)
    {
        //
    }
}
