<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\PresentationInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentProgressPresentationController extends Controller
{
    private PresentationInterface $presentations;
    public function __construct(
        PresentationInterface $presentation
    )
    {
        $this->presentations = $presentation;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentationsToday = $this->presentations->get();
        $presentations = $this->presentations->getPresentationWithMembers();
        $unpresentedProject = $this->presentations->getUnpresentedProject();
        return view('admin.page.student-progress.presentation.index', compact('presentationsToday','presentations','unpresentedProject'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.page.student-progress.presentation.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
