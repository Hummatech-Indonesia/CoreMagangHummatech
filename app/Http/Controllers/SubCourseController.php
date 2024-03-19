<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubCourseInterface;
use App\Models\SubCourse;
use App\Http\Requests\StoreSubCourseRequest;
use App\Http\Requests\UpdateSubCourseRequest;
use App\Services\SubCourseService;

class SubCourseController extends Controller
{

    private SubCourseInterface $subCourse;
    private SubCourseService $service;

    public function __construct(SubCourseInterface $subCourse ,SubCourseService $service)
    {
        $this->subCourse = $subCourse;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCourses = $this->subCourse->get();
        return view('' , compact('subCourses'));
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
    public function store(StoreSubCourseRequest $request)
    {
        $data = $this->service->store($request);
        $this->subCourse->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCourse $subCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCourse $subCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCourseRequest $request, SubCourse $subCourse)
    {
        $data = $this->service->update($subCourse, $request);
        $this->subCourse->update($subCourse->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCourse $subCourse)
    {
        $this->service->delete($subCourse);
        $this->subCourse->delete($subCourse->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
