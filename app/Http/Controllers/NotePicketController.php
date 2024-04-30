<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NotePicketInterface;
use App\Models\NotePicket;
use App\Http\Requests\StoreNotePicketRequest;
use App\Http\Requests\UpdateNotePicketRequest;

class NotePicketController extends Controller
{
    private  NotePicketInterface $notePicket;
    public function __construct(NotePicketInterface $notePicket)
    {
        $this->notePicket = $notePicket;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notePickets = $this->notePicket->get();
        return view('' , compact('notePickets'));
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
    public function store(StoreNotePicketRequest $request)
    {
        $this->notePicket->store($request->validated());
        return redirect()->back()->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(NotePicket $notePicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotePicket $notePicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotePicketRequest $request, NotePicket $notePicket)
    {
        $this->notePicket->update( $notePicket->id, $request->validated());
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotePicket $notePicket)
    {
        $this->notePicket->delete($notePicket->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
