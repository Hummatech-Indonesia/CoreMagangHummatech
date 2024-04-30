<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\PresentationInterface;
use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;

class PresentationController extends Controller
{
    private PresentationInterface $presentation;
    public function __construct(PresentationInterface $presentation)
    {
        $this->presentation = $presentation;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = $this->presentation->get();
        return view('' , compact('presentations'));
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
    public function store(StorePresentationRequest $request)
    {
        $this->presentation->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
        //
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
        $this->presentation->update($presentation->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        $this->presentation->delete($presentation->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
