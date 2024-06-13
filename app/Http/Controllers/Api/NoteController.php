<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\HummataskTeam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private CategoryBoardInterface $categoryBoard;
    public function __construct(CategoryBoardInterface $categoryBoardInterface)
    {
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
}
