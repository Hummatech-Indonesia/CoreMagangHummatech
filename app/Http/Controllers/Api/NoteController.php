<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\HummataskTeam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private CategoryBoardInterface $categoryBoard;
    private BoardInterface $board;
    public function __construct(CategoryBoardInterface $categoryBoardInterface, BoardInterface $boardInterface)
    {
        $this->board = $boardInterface;
        $this->categoryBoard = $categoryBoardInterface;
    }

    /**
     * index
     *
     * @param  mixed $hummataskTeam
     * @return JsonResponse
     */
    public function index(HummataskTeam $hummataskTeam): JsonResponse
    {
        $notes = $this->categoryBoard->getByHummataskTeamId($hummataskTeam->id);
        return ResponseHelper::success(NoteResource::collection($notes));

    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $hummataskTeam
     * @return JsonResponse
     */
    public function store(NoteRequest $request, HummataskTeam $hummataskTeam): JsonResponse
    {
        $data = $request->validated();
        $data['hummatask_team_id'] = $hummataskTeam->id;
        $categoryBoard = $this->categoryBoard->store($data);
        foreach ($data['name'] as $title) {
            $dataBoard['name'] = $title;
            $dataBoard['category_board_id'] = $categoryBoard->id;
            $this->board->store($dataBoard);
        }
        return ResponseHelper::success(null, trans('alert.add_success'));
    }
}
