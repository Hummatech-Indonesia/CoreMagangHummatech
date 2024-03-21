<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LimitInterface;
use App\Models\Limits;
use App\Http\Requests\StoreLimitsRequest;
use App\Http\Requests\UpdateLimitsRequest;

class LimitsController extends Controller
{
    private LimitInterface $limits;

    public function __construct(LimitInterface $limits)
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
    public function store(StoreLimitsRequest $request)
    {
        $this->limits->store($request->validated());
        return back()->with('success' , 'Limit berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Limits $limits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Limits $limits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLimitsRequest $request, Limits $limits)
    {
        $this->limits->update($limits->id , $request->validated());
        return back()->with('success' , 'Limit berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Limits $limits)
    {
        //
    }
}
