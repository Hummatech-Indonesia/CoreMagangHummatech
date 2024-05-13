<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\WarningLetter;
use App\Models\Warning_Letter;
use App\Http\Controllers\Controller;
use App\Services\WarningLetterService;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreWarning_LetterRequest;
use App\Http\Requests\UpdateWarning_LetterRequest;
use App\Contracts\Interfaces\WarningLetterInterface;
use Illuminate\Http\Request;

class WarningLetterController extends Controller
{
    private WarningLetterInterface $warningLetters;
    private WarningLetterService $service;
    private StudentInterface $students;
    public function __construct(WarningLetterInterface $warningLetters , WarningLetterService $service, StudentInterface $students)
    {
        $this->warningLetters = $warningLetters;
        $this->service = $service;
        $this->students = $students;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $warningLetters = $this->warningLetters->search($request)->paginate(10);
        $students = $this->students->where();
        return view('admin.page.warning_letter.index' , compact('warningLetters', 'students'));
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
    public function store(StoreWarning_LetterRequest $request, WarningLetter $warningLetter, Student $student)
    {
        $data = $this->service->store($request, $warningLetter, $student);
        $this->warningLetters->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(WarningLetter $WarningLetter)
    {
        $WarningLetter = $this->warningLetters->show($WarningLetter->id);
        return view('admin.page.warning_letter.show', compact('WarningLetter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarningLetter $WarningLetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarning_LetterRequest $request, WarningLetter $WarningLetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarningLetter $WarningLetter)
    {
        $this->service->delete($WarningLetter);
        $this->warningLetters->delete($WarningLetter->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
