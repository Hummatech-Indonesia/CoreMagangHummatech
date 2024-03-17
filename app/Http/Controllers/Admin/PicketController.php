<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\PicketInterface;
use App\Http\Controllers\Controller;
use App\Models\Picket;
use App\Http\Requests\StorePicketRequest;
use App\Http\Requests\UpdatePicketRequest;

class PicketController extends Controller
{
    private PicketInterface $picket;

    public function __construct(PicketInterface $picket)
    {
        $this->picket = $picket;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickets = $this->picket->get();
        return view('admin.page.picket.schedule' , compact('pickets'));
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
    public function store(StorePicketRequest $request)
    {
        $this->picket->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picket $picket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picket $picket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePicketRequest $request, Picket $picket)
    {
        $this->picket->update($picket->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picket $picket)
    {
        $this->picket->delete($picket->id);
        return back()->with('success' , 'Data Berhasil DiHapus');
    }
}
