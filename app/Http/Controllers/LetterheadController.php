<?php

namespace App\Http\Controllers;

use App\Models\Letterhead;
use App\Services\LetterheadService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLetterheadRequest;
use App\Http\Requests\UpdateLetterheadRequest;
use App\Contracts\Interfaces\LetterheadsInterface;
use Illuminate\Support\Facades\DB;

class LetterheadController extends Controller
{
    private LetterheadsInterface $letterhead;
    private LetterheadService $service;


    public function __construct(LetterheadsInterface $letterhead , LetterheadService $service)
    {
        $this->letterhead = $letterhead;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letterheads = $this->letterhead->whereauth(Auth::user()->id);
        return view('student_online_&_offline.letterhead.index' , compact('letterheads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterheadRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $this->service->store($request);
            $data['user_id'] = auth()->user()->id;
            $this->letterhead->store($data);
            DB::commit();
            return back()->with('success' , 'Berhasil Menambahkan data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gagal Menambahkan data, ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterheadRequest $request, Letterhead $letterhead)
    {
        DB::beginTransaction();
        try {
            $data = $this->service->update($letterhead, $request);
            $this->letterhead->update($letterhead->id, $data);
            DB::commit();
            return back()->with('success' , 'Berhasi Memperbarui Data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gagal Mengubah data, ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letterhead $letterhead)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($letterhead);
            $this->letterhead->delete($letterhead->id);
            DB::commit();
            return back()->with('success' , 'Berhasi Menghapus Data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gagal Menghapus data, ' . $th->getMessage());
        }
   }
}
