<?php

namespace App\Services;

use App\Contracts\Repositories\CategoryBoardRepository;
use App\Models\CategoryBoard;

class CategoryBoardService
{
    public function createCategoryBoard($title, $status)
    {
        return CategoryBoard::create([
            'title' => $title,
            'status' => $status,
        ]);
    }
}
