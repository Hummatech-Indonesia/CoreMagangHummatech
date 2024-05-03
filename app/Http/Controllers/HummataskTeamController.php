<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Models\HummataskTeam;
use App\Http\Requests\StoreHummataskTeamRequest;
use App\Http\Requests\UpdateHummataskTeamRequest;
use App\Services\HummataskTeamService;
use Request;

class HummataskTeamController extends Controller
{
    private HummataskTeamService $service;
    private HummataskTeamInterface $hummatask_team;

    public function __construct(HummataskTeamInterface $hummatask_team, HummataskTeamService $service)
    {
        $this->hummatask_team = $hummatask_team;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hummatask_teams = $this->hummatask_team->get();
        return view('Hummatask.index', compact('hummatask_teams'));
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
    public function store(StoreHummataskTeamRequest $request)
    {
        $data = $this->service->store($request);
        $this->hummatask_team->store($data);
        return back()->with('success', 'Team baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HummataskTeam $hummataskTeam)
    {
        return view('Hummatask.team.index', compact('hummataskTeam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HummataskTeam $hummataskTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHummataskTeamRequest $request, HummataskTeam $hummataskTeam)
    {
        $data = $this->service->update($hummataskTeam, $request->validated());
        $this->hummatask_team->update($hummataskTeam->id, $data);
        return back()->with('success', 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HummataskTeam $hummataskTeam)
    {
        $this->service->delete($hummataskTeam);
        $this->hummatask_team->delete($hummataskTeam->id);
        return back()->with('success', 'Berhasi Menghapus Data');
    }
}
