<?php

namespace App\Services;

use App\Contracts\Repositories\BoardRepository;
use App\Models\Board;
use Illuminate\Support\Facades\DB;

class BoardService
{
    public function createBoard($name, $categoryBoardId)
    {
        return Board::create([
            'name' => $name,
            'category_board_id' => $categoryBoardId,
        ]);
    }

    public function getBoardCountsByCategory(int $teamId): array
    {
        // Ambil semua boards dan kelompokkan berdasarkan category_board_id, lalu hitung jumlahnya
        $boardsCountPerCategory = Board::select('category_board_id', DB::raw('count(*) as board_count'))
                                        ->groupBy('category_board_id')
                                        ->pluck('board_count', 'category_board_id')
                                        ->toArray();

        return $boardsCountPerCategory;
    }
}
