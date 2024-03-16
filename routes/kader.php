<?php

use App\Http\Controllers\Payment\TripayController;
use Illuminate\Support\Facades\Route;

Route::get('test/tripay' , [TripayController::class , 'index']);
Route::post('transaction/tripay' , [TripayController::class , 'store']);
