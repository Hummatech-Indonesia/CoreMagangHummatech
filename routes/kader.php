<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HummataskTeamController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\SubCourseController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('create/jurnal', [JournalController::class , 'store']);

// Admin
Route::get('permission', function () {return view('admin.page.approval.permision');});
// end admin
Route::get('timetable', function () {return view('mentor.zoomschedule');});
// mentor

Route::get('challenge', [CourseController::class ,'index']);
Route::post('create/materi', [CourseController::class ,'store']);

# Task
Route::post('create/task', [TaskController::class ,'store']);
Route::put('update/task/{task}', [TaskController::class ,'update']);
Route::delete('delete/task/{task}', [TaskController::class ,'destroy']);

# sub materi
Route::post('create/sub-materi/{course}', [SubCourseController::class ,'store']);
Route::get('detail/pelajari/{subCourse}', [SubCourseController::class ,'show']);
Route::get('show/materi/{course}', [CourseController::class ,'show']);
// End mentor

// student offline
Route::get('student-offline/langganan', function () {return view('student_offline.langganan.index');});
// end
// student online
// Route::get('student-online/langganan', function () {return view('student_online.langganan.index');});
// end
// Hummatask
// Route::get('dashboard/task', function () {return view('Hummatask.index');});
// Route::get('hummateam/team', function () {return view('Hummatask.team.index');});
// Route::get('hummateam/board', function () {return view('Hummatask.team.board');});


// team mentor
Route::delete('mentor/team/delete/{hummataskTeam}' , [HummataskTeamController::class , 'destroy']);
