<?php

namespace App\Services;

use App\Contracts\Repositories\BoardRepository;
use App\Models\Board;

class BoardService
{
    public function createBoard($name, $categoryBoardId)
    {
        return Board::create([
            'name' => $name,
            'category_board_id' => $categoryBoardId,
        ]);
    }
}
