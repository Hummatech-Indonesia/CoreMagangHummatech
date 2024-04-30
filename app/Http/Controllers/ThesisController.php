<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ThesisInterface;
use App\Models\Thesis;
use App\Http\Requests\StoreThesisRequest;
use App\Http\Requests\UpdateThesisRequest;

class ThesisController extends Controller
{
    private ThesisInterface $thesis;

    public function __construct(ThesisInterface $thesis)
    {
        $this->thesis = $thesis;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thesiss = $this->thesis->get();
        return view('' , compact('thesiss'));
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
    public function store(StoreThesisRequest $request)
    {
        $this->thesis->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thesis $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thesis $thesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThesisRequest $request, Thesis $thesis)
    {
        $this->update($thesis->id , $request->validated());
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        $this->delete($thesis->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
