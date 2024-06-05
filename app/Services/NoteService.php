<?php

namespace App\Services;

use App\Models\CategoryBoard;
use App\Models\Board;
use App\Models\HummataskTeam;
use App\Http\Requests\CatatanRequest;
use App\Models\StudentTeam;
use Illuminate\Http\Request;

class NoteService
{
    public function simpanCatatan(Request $request)
    {
        $hummataskTeam = HummataskTeam::find($request->hummatask_team_id);

        if (!$hummataskTeam) {
            throw new \Exception('Tim tidak ditemukan.');
        }

        $categoryBoard = new CategoryBoard();
        $categoryBoard->title = $request->title;
        $categoryBoard->status = $request->status;
        $categoryBoard->hummatask_team_id = $hummataskTeam->id;
        $categoryBoard->save();

        $studentTeams = StudentTeam::where('hummatask_team_id', $hummataskTeam->id)->get();

        foreach ($request->name as $name) {
            // foreach ($studentTeams as $studentTeam) {
                $board = new Board();
                $board->name = $name;
                $board->category_board_id = $categoryBoard->id;
                foreach ($studentTeams as $studentTeam){
                    $board->student_team_id = $studentTeam->id;
                }
                $board->save();
            // }
        }
    }



    public function updateCatatan(Request $request, $id)
    {
        $categoryBoard = CategoryBoard::find($id);

        if (!$categoryBoard) {
            throw new \Exception('Catatan tidak ditemukan.');
        }

        $categoryBoard->title = $request->title;
        $categoryBoard->status = $request->status;
        $categoryBoard->save();

        $categoryBoard->boards()->delete();

        foreach ($request->name as $name) {
            $board = new Board();
            $board->name = $name;
            $board->category_board_id = $categoryBoard->id;
            $board->save();
        }
    }

    public function updateTitle(Request $request, $id)
    {
        $categoryBoard = CategoryBoard::find($id);

        if (!$categoryBoard) {
            throw new \Exception('Catatan tidak ditemukan.');
        }

         $categoryBoard->title = $request->title;
         $categoryBoard->save();

    }
}
