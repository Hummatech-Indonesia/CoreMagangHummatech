<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;
use App\Models\HummataskTeam;

class BoardController extends Controller
{
    private BoardInterface $board;
    private HummataskTeamInterface $hummataskTeam;
    private CategoryBoardInterface $categoryBoard;
    private StudentProjectInterface $studentProject;
    public function __construct(BoardInterface $board, HummataskTeamInterface $hummataskTeam, CategoryBoardInterface $categoryBoard, StudentProjectInterface $studentProject)
    {
        $this->board = $board;
        $this->hummataskTeam = $hummataskTeam;
        $this->categoryBoard = $categoryBoard;
        $this->studentProject = $studentProject;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(HummataskTeam $hummataskTeam)
    {
        $boards = $this->board->get();
        return view('' , compact('boards','hummataskTeam','categoryBoard','studentProject'));
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
    public function store(StoreBoardRequest $request)
    {
        $this->board->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, HummataskTeam $hummataskTeam)
    {
        $slugs = $this->hummataskTeam->slug($slug);
        return view('Hummatask.team.note', compact('hummataskTeam', 'slugs'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        $this->board->update($board->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        $this->board->delete($board->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }

}
