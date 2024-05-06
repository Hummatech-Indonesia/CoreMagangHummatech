<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Models\NoteTeam;
use App\Http\Requests\StoreNoteTeamRequest;
use App\Http\Requests\UpdateNoteTeamRequest;
use App\Models\HummataskTeam;

class NoteTeamController extends Controller
{
    private HummataskTeamInterface $hummataskTeam;
    public function __construct(HummataskTeamInterface $hummataskTeam)
    {
        $this->hummataskTeam = $hummataskTeam;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($slug, HummataskTeam $hummataskTeam)
    {
        $slugs = $this->hummataskTeam->slug($slug);
        return view('Hummatask.team.note', compact('hummataskTeam', 'slugs'));

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
    public function store(StoreNoteTeamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NoteTeam $noteTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoteTeam $noteTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteTeamRequest $request, NoteTeam $noteTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoteTeam $noteTeam)
    {
        //
    }
}
