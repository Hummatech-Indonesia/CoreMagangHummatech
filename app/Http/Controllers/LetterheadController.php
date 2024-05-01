<?php

namespace App\Http\Controllers;

use App\Models\Letterhead;
use App\Services\LetterheadService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLetterheadRequest;
use App\Http\Requests\UpdateLetterheadRequest;
use App\Contracts\Interfaces\LetterheadsInterface;

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
        return view('student_online.letterhead.index' , compact('letterheads'));
    }

    public function indexOffline()
    {
        $letterheads = $this->letterhead->whereauth(Auth::user()->id);
        return view('student_offline.others.letter-head' , compact('letterheads'));
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
    public function store(StoreLetterheadRequest $request)
    {
        // dd($request->all());
        // $data =  $request->validated();
        $data = $this->service->store($request);
        $data['user_id'] = auth()->user()->id;
        // dd($data);
        $this->letterhead->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Letterhead $letterhead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letterhead $letterhead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterheadRequest $request, Letterhead $letterhead)
    {
        $data = $this->service->update($letterhead, $request);
        $this->letterhead->update($letterhead->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letterhead $letterhead)
    {
        $this->service->delete($letterhead);
        $this->letterhead->delete($letterhead->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
   }
}
