<?php

namespace App\Http\Controllers\Admin;

use App\Models\ResponseLetter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResponseLetterRequest;
use App\Http\Requests\UpdateResponseLetterRequest;
use App\Contracts\Interfaces\ResponseLetterInterface;

class ResponseLetterController extends Controller
{
    private ResponseLetterInterface $responseLetter;

    public function __construct(ResponseLetterInterface $responseLetter)
    {
        $this->responseLetter = $responseLetter;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsesletters = $this->responseLetter->get();

        return view('admin.page.responseletters.index', compact('responsesletters'));
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
    public function store(StoreResponseLetterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ResponseLetter $responseLetter)
    {
        $responsesletters = $this->responseLetter->show($responseLetter->id);
        return view('admin.page.responseletters.show' , compact('responsesletters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponseLetter $responseLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponseLetterRequest $request, ResponseLetter $responseLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponseLetter $responseLetter)
    {
        //
    }
}
