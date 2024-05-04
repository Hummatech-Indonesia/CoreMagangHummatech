<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Enum\StatusPresentationEnum;
use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\LimitPresentation;
use App\Services\PresentationService;
use Carbon;

class PresentationController extends Controller
{
    private PresentationInterface $presentation;
    private LimitPresentationInterface $limits;
    public function __construct(PresentationInterface $presentation, LimitPresentationInterface $limits, PresentationService $service)
    {
        $this->presentation = $presentation;
        $this->limits = $limits;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finisheds = $this->presentation->whereStatus(StatusPresentationEnum::FINISH->value);
        $pendings = $this->presentation->whereStatus(StatusPresentationEnum::PENNDING->value);
        $ongoings = $this->presentation->whereStatus(StatusPresentationEnum::ONGOING->value);
        $limits = $this->limits->first();
        return view('admin.page.offline-students.presentation.index' , compact('finisheds','pendings','ongoings','limits'));
    }
    public function mentorshow()
    {
        $limits = $this->limits->first();
        $presentations = $this->presentation->get();
        return view('mentor.presentation.index2',compact('limits','presentations'));
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
    // public function store(StorePresentationRequest $request)
    // {
    //     $this->presentation->store($request->validated());
    //     return back()->with('success' , 'Data Berhasil Ditambahkan');
    // }

    public function store(StorePresentationRequest $request)
    {
        // Validasi input
        $validatedData = $request->validated();

        // Lakukan penyimpanan dengan SOLID Principle
        $presentationService = new PresentationService();
        $result = $presentationService->storePresentations($validatedData);

        if ($result['success']) {
            return back()->with('success', 'Data berhasil ditambahkan.');
        } else {
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
        $finisheds = $this->presentation->whereStatus(StatusPresentationEnum::FINISH->value);
        $pendings = $this->presentation->whereStatus(StatusPresentationEnum::PENNDING->value);
        $ongoings = $this->presentation->whereStatus(StatusPresentationEnum::ONGOING->value);
        return view('admin.page.presentation.index' , compact('finisheds','pendings','ongoings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $this->presentation->update($presentation->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        $this->presentation->delete($presentation->id);
        return back()->with('success' , 'Data Berhasil Dihapus');
    }
}
