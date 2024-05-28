<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Models\CategoryBoard;
use App\Http\Requests\StoreCategoryBoardRequest;
use App\Http\Requests\UpdateCategoryBoardRequest;
use App\Models\HummataskTeam;
use App\Services\NoteService;
use Illuminate\Http\Request;

class CategoryBoardController extends Controller
{
    private CategoryBoardInterface $categoryBoard;
    private HummataskTeamInterface $hummataskTeam;
    private StudentProjectInterface $studentProject;
    private ProjectInterface $Project;
    private BoardInterface $board;
    private NoteService $noteservice;
    private StudentTeamInterface $studentTeam;
    public function __construct(CategoryBoardInterface $categoryBoard, HummataskTeamInterface $hummataskTeam, BoardInterface $board, StudentProjectInterface $studentProject, ProjectInterface $Project, NoteService $noteService, StudentTeamInterface $studentTeam)
    {
        $this->categoryBoard = $categoryBoard;
        $this->hummataskTeam = $hummataskTeam;
        $this->board = $board;
        $this->studentProject = $studentProject;
        $this->Project = $Project;
        $this->noteservice = $noteService;
        $this->studentTeam = $studentTeam;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($slug, HummataskTeam $hummataskTeam)
    {
        $team = $this->hummataskTeam->slug($slug);
        $categoryBoards = $this->categoryBoard->getByHummataskTeamId($team->id);
        $boards = $this->board->get();
        $projects = $this->Project->where('title', $team->slug);
        $studentTeams = $this->studentTeam->get();
        foreach ($projects as $project) {
            $studentTeams = $this->studentTeam->where('project_id', $project->id);
        }
        return view('Hummatask.team.board' , compact('categoryBoards', 'hummataskTeam', 'boards', 'team', 'studentTeams'));
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
        $this->noteservice->updateCatatan($request,$categoryBoard->id);
        return back()->with('success' , 'Data Berhasil Diperbarui');
        // $this->categoryBoard->update($categoryBoard->id  , $request->validated());
    }

    public function updateList(Request $request, CategoryBoard $categoryBoard)
    {
        $this->noteservice->updateTitle($request,$categoryBoard->id);
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
    public function savenote(Request $request)
    {
        $this->noteservice->simpanCatatan($request);

        return redirect()->back()->with('success', 'Catatan berhasil disimpan.');
    }

    public function shownote($slug, HummataskTeam $hummataskTeam)
    {
        $team = $this->hummataskTeam->slug($slug);
        $categoryBoards = $this->categoryBoard->getByHummataskTeamId($team->id);
        $board = [];

        foreach ($categoryBoards as $key => $categoryBoard) {
            $board = $this->board->whereCategory($categoryBoard->id);
        }

        $revision = $this->categoryBoard->getByStatus('revision_note', $team->id);

        return view('Hummatask.team.note', compact('hummataskTeam', 'team','categoryBoards','board','revision'));
    }
}
