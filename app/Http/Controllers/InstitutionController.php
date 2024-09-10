<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\InstitutionInterface;
use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;

class InstitutionController extends Controller
{
    private InstitutionInterface $institution;

    public function __construct(InstitutionInterface $institution)
    {
        $this->institution = $institution;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = $this->institution->get();
        return view('admin.page.institution.index', compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        $this->institution->store($request->validated());
        return redirect()->back()->with('success', 'Lembaga berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $this->institution->update($institution->id, $request->validated());
        return redirect()->back()->with('success', 'Lembaga berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $this->institution->delete($institution->id);
        return redirect()->back()->with('success', 'Lembaga berhasil dihapus');
    }
}
