<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Models\LimitPresentation;
use App\Http\Requests\StoreLimitPresentationRequest;
use App\Http\Requests\UpdateLimitPresentationRequest;
use Carbon;

class LimitPresentationController extends Controller
{
    private LimitPresentationInterface $limits;

    public function __construct(LimitPresentationInterface $limits)
    {
        $this->limits = $limits;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLimitPresentationRequest $request)
    {
        try {
            $this->limits->store($request->validated());
            return back()->with('success' , 'Limit berhasil ditambahkan');
        } catch (\Throwable $e) {
            return back()->with('warning' , $e);
        }
    }

    public function storeOrUpdate(StoreLimitPresentationRequest $request)
    {
        $today = Carbon::now()->toDateString();
        $limit = LimitPresentation::whereDate('created_at', $today)->first();

        // Check if limit setting for today exists
        if ($limit) {
            // Update the existing limit setting
            $limit->update($request->all());
        } else {
            // Create a new limit setting
            LimitPresentation::create($request->all());
        }

        return redirect()->back()->with('success', 'Limit presentation setting updated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LimitPresentation $limitPresentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LimitPresentation $limitPresentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLimitPresentationRequest $request, LimitPresentation $limitPresentation)
    {
        $this->limits->update($limitPresentation->id , $request->validated());
        return back()->with('success' , 'Limit berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LimitPresentation $limitPresentation)
    {
        //
    }
}
