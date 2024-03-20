<?php

use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\Payment\TripayController;
use App\Http\Controllers\SubCourseController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::post('transaction/tripay', [TripayController::class , 'store']);
Route::any('transaction/callback', [TripayController::class , 'callback'])->withoutMiddleware(VerifyCsrfToken::class);

Route::post('create/jurnal', [JournalController::class , 'store']);

// Admin
Route::get('permission', function () {return view('admin.page.approval.permision');});
// end admin
Route::get('timetable', function () {return view('mentor.zoomschedule');});
// mentor
Route::get('challenge', [CourseController::class ,'index']);
Route::post('create/materi', [CourseController::class ,'store']);
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
