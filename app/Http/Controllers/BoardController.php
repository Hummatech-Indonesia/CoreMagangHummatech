<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BoardInterface;
use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;

class BoardController extends Controller
{
    private BoardInterface $board;
    public function __construct(BoardInterface $board)
    {
        $this->board = $board;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = $this->board->get();
        return view('' , compact('boards'));
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
        $this->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //
    }

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
