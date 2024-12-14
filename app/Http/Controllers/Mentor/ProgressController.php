<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;



class ProgressController extends Controller
{



    public function __construct() {}
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function projectSiswa()
    {
        return view('mentor.progress.project-siswa.index');
    }
    public function projectGroupSiswa()
    {
        return view('mentor.progress.project-siswa.project-group');
    }
    public function detailProgressSiswa()
    {
        return view('mentor.progress.project-siswa.detail-progress');
    }



    public function progressProject()
    {
        return view('mentor.progress.progress-project.index');
    }
    public function detailprogressProject()
    {
        return view('mentor.progress.progress-project.detail-progress');
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
    public function show(string $id)
    {
        //
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
