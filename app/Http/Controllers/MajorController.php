<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MajorInterface;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    private MajorInterface $major;

    public function __construct(MajorInterface $major)
    {
        $this->major = $major;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $majors = $this->major->search($request);
        return view('admin.page.major.index', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request)
    {
        try {
            $this->major->store($request->validated());
            return redirect()->back()->with('success', 'Jurusan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan jurusan: ' . $th->getMessage());
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        try {
            $this->major->update($major->id, $request->validated());
            return redirect()->back()->with('success', 'Jurusan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah jurusan: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->major->delete($id);
            return redirect()->back()->with('success', 'Jurusan berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus jurusan: ' . $th->getMessage());
        }
    }
}
