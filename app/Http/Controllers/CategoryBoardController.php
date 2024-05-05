<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Models\CategoryBoard;
use App\Http\Requests\StoreCategoryBoardRequest;
use App\Http\Requests\UpdateCategoryBoardRequest;
use App\Models\HummataskTeam;

class CategoryBoardController extends Controller
{
    private CategoryBoardInterface $categoryBoard;
    private HummataskTeamInterface $hummataskTeam;
    private StudentProjectInterface $studentProject;
    private ProjectInterface $Project;
    private BoardInterface $board;
    public function __construct(CategoryBoardInterface $categoryBoard, HummataskTeamInterface $hummataskTeam, BoardInterface $board, StudentProjectInterface $studentProject, ProjectInterface $Project)
    {
        $this->categoryBoard = $categoryBoard;
        $this->hummataskTeam = $hummataskTeam;
        $this->board = $board;
        $this->studentProject = $studentProject;
        $this->Project = $Project;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(HummataskTeam $hummataskTeam)
    {
        $categoryBoards = $this->categoryBoard->get();
        $boards = $this->board->get();
        $projects = $this->Project->where('hummatask_team_id', $hummataskTeam->id);
        foreach ($projects as $project) {
            $studentProjects = $this->studentProject->where('project_id', $project->id);
        }
        return view('Hummatask.team.board' , compact('categoryBoards', 'hummataskTeam', 'boards', 'studentProjects'));
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
    public function store(StoreCategoryBoardRequest $request)
    {
        $this->categoryBoard->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryBoard $categoryBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryBoard $categoryBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryBoardRequest $request, CategoryBoard $categoryBoard)
    {
        $this->categoryBoard->update($categoryBoard->id  , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryBoard $categoryBoard)
    {
        $this->categoryBoard->delete($categoryBoard->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
