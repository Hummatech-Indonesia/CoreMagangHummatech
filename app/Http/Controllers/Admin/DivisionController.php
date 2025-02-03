<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\DivisionInterface;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    private DivisionInterface $division;
    public function __construct(DivisionInterface $division)
    {
        $this->division = $division;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $divisions = $this->division->search($request)->paginate(12);
        return view('admin.page.division.index', compact('divisions'));
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
    public function store(StoreDivisionRequest $request)
    {
        $this->division->store($request->validated());
        return back()->with('succcess', 'Divisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $this->division->update($division->id, $request->validated());
        return back()->with('success', 'Divisi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        try {
            $this->division->delete($division->id);
            return back()->with('success', 'Divisi Berhasil Dihapus');
        } catch (\Throwable $e) {
            return back()->with('success', 'Divisi Sedang Digunakan');
        }
    }
}
