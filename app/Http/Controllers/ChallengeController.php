<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ChallengeInterface;
use App\Models\Challenge;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;

class ChallengeController extends Controller
{

    private ChallengeInterface $challenge;

    public function __construct(ChallengeInterface $challenge)
    {
        $this->challenge = $challenge;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = $this->challenge->get();
        return view('mentor.challange.index' , compact('challenges'));
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
    public function store(StoreChallengeRequest $request)
    {
        $this->challenge->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        $challenges = $this->challenge->get();
        return view('student_offline.challenge.index', compact('challenges'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        $this->challenge->update($challenge->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $this->challenge->delete($challenge->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
