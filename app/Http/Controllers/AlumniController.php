<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AlumniInterface;
use App\Models\Alumni;
use App\Http\Requests\StoreAlumniRequest;
use App\Http\Requests\UpdateAlumniRequest;
use App\Services\AlumniService;

class AlumniController extends Controller
{
    private AlumniInterface $alumni;
    private AlumniService $service;

    public function __construct(AlumniInterface $alumni, AlumniService $service)
    {
        $this->alumni = $alumni;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = $this->alumni->get();
        return view('admin.page.user.alumni', compact('alumni'));
    }

    public function landing()
    {
        $alumni = $this->alumni->get();

        return view('landing.alumni', compact('alumni'));
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
    public function store(StoreAlumniRequest $request)
    {
        $data = $this->service->store($request);
        $this->alumni->store($data);

        return back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumniRequest $request, Alumni $alumni)
    {
        $data = $this->service->update($alumni, $request);
        $this->alumni->update($alumni->id, $data);
        return back()->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        $this->service->delete($alumni);
        $this->alumni->delete($alumni->id);
        return back()->with('success', 'Berhasil menghapus data');
    }
}
