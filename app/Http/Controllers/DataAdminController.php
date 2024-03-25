<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DataAdminInterface;
use App\Models\DataAdmin;
use App\Http\Requests\StoreDataAdminRequest;
use App\Http\Requests\UpdateDataAdminRequest;
use App\Services\DataAdminService;

class DataAdminController extends Controller
{
    private DataAdminInterface $dataAdminInterface;
    private DataAdminService $dataAdminService;

    public function __construct(DataAdminInterface $dataAdminInterface, DataAdminService $dataAdminService)
    {
        $this->dataAdminInterface = $dataAdminInterface;
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
    public function store(StoreDataAdminRequest $request)
    {
        $data = $this->dataAdminService->store($request);
        $this->dataAdminInterface->store($data);

        return back()->with('success', 'Data Admin Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(DataAdmin $dataAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAdmin $dataAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataAdminRequest $request, DataAdmin $dataAdmin)
    {
        $data = $this->dataAdminService->update($dataAdmin, $request);
        $this->dataAdminInterface->update($dataAdmin->id,$data);

        return back()->with('success', 'Data Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAdmin $dataAdmin)
    {
        //
    }
}
