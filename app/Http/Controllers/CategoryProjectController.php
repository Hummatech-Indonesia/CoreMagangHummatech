<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Models\CategoryProject;
use App\Http\Requests\StoreCategoryProjectRequest;
use App\Http\Requests\UpdateCategoryProjectRequest;

class CategoryProjectController extends Controller
{
    private CategoryProjectInterface $categoryProject;

    public function __construct(CategoryProjectInterface $categoryProject)
    {
        $this->categoryProject = $categoryProject;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryProjects = $this->categoryProject->get();
        return view('admin.page.category-project.index' , compact('categoryProjects'));
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
    public function store(StoreCategoryProjectRequest $request)
    {
        $this->categoryProject->store($request->validated());
        return back()->with('success' , 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProject $categoryProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProject $categoryProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProjectRequest $request, CategoryProject $categoryProject)
    {
        $this->categoryProject->update($categoryProject->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProject $categoryProject)
    {
        $this->categoryProject->delete($categoryProject->id);
        return back()->with('success' , 'Data Berhasil DiHapus');
    }
}
