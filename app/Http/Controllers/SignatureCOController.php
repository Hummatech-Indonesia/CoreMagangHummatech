<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\Signature_COInterface;
use App\Models\Signature_CO;
use App\Http\Requests\StoreSignature_CORequest;
use App\Http\Requests\UpdateSignature_CORequest;

class SignatureCOController extends Controller
{
    private Signature_COInterface $signature_CO;

    public function __construct(Signature_COInterface $signature_CO)
    {
        $this->signature_CO = $signature_CO;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $dataceos = $this->signature_CO->show($id);
        return view('signature.index' , compact('dataceos'));
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
    public function store(StoreSignature_CORequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Signature_CO $signature_CO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signature_CO $signature_CO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignature_CORequest $request, Signature_CO $signature_CO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signature_CO $signature_CO)
    {
        //
    }
}
