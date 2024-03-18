<?php

use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Support\Facades\Route;

Route::get('test/tripay' , [TripayController::class , 'index']);
Route::post('transaction/tripay' , [TripayController::class , 'store']);
Route::post('create/jurnal' , [JournalController::class , 'store']);
Route::get('show/student/{responseLetter}' , [ResponseLetterController::class , 'show']);

// Admin
Route::get('permision', function () {return view('admin.page.approval.permision');});
// end admin


// student offline
Route::get('student-offline/langganan', function () {return view('student_offline.langganan.index');});
// end
// student online
Route::get('student-online/langganan', function () {return view('student_online.langganan.index');});
// end
