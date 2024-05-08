<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DataCOInterface;
use App\Models\DataCO;
use App\Http\Requests\StoreDataCORequest;
use App\Http\Requests\UpdateDataCORequest;
use App\Services\DataCOService;

class DataCOController extends Controller
{
    private DataCOInterface $dataCO;
    private DataCOService $dataAdminService;

    public function __construct(DataCOInterface $dataCO, DataCOService $dataAdminService)
    {
        $this->dataCO = $dataCO;
        $this->dataAdminService = $dataAdminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDataCORequest $request)
    {
        $data = $this->dataAdminService->store($request->validated());
        $this->dataCO->store($data);

        return back()->with('success', 'Data CO Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataCO $dataCO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataCO $dataCO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataCORequest $request, DataCO $dataCO)
    {
        $data = $this->dataAdminService->update($dataCO, $request);
        $this->dataCO->update($dataCO->id, $data);

        return back()->with('success', 'Data CO Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataCO $dataCO)
    {
        //
    }
}
