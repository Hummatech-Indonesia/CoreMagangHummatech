<?php

use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('test/tripay', [TripayController::class , 'index']);
Route::post('transaction/tripay', [TripayController::class , 'store']);
Route::any('transaction/callback', [TripayController::class , 'callback'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('create/jurnal', [JournalController::class , 'store']);

// Admin
Route::get('permision', function () {return view('admin.page.approval.permision');});
// end admin
