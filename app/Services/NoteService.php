<?php

namespace App\Services;

use App\Models\CategoryBoard;
use App\Models\Board;
use App\Models\HummataskTeam; // Import model HummataskTeam
use App\Http\Requests\CatatanRequest;
use Illuminate\Http\Request;

class NoteService
{
    public function simpanCatatan(Request $request)
    {
        // Temukan tim yang sesuai berdasarkan data yang diberikan
        $hummataskTeam = HummataskTeam::find($request->hummatask_team_id);

        // Pastikan tim ditemukan
        if (!$hummataskTeam) {
            throw new \Exception('Tim tidak ditemukan.');
        }

        // Simpan judul dan status ke dalam tabel category_board
        $categoryBoard = new CategoryBoard();
        $categoryBoard->title = $request->title;
        $categoryBoard->status = $request->status;
        $categoryBoard->hummatask_team_id = $hummataskTeam->id; // Mengisi hummatask_team_id
        $categoryBoard->save();

        // Simpan nama-nama ke dalam tabel board
        foreach ($request->name as $name) {
            $board = new Board();
            $board->name = $name;
            $board->category_board_id = $categoryBoard->id;
            $board->save();
        }
    }

    public function updateCatatan(Request $request, $id)
    {
        // Temukan catatan yang akan diupdate
        $categoryBoard = CategoryBoard::find($id);

        // Pastikan catatan ditemukan
        if (!$categoryBoard) {
            throw new \Exception('Catatan tidak ditemukan.');
        }

        // Update judul dan status
        $categoryBoard->title = $request->title;
        $categoryBoard->status = $request->status;
        $categoryBoard->save();

        // Hapus semua board yang terkait dengan catatan ini
        $categoryBoard->boards()->delete();

        // Simpan kembali nama-nama ke dalam tabel board
        foreach ($request->name as $name) {
            $board = new Board();
            $board->name = $name;
            $board->category_board_id = $categoryBoard->id;
            $board->save();
        }
    }
}
