<?php

use App\Http\Controllers\Admin\PicketController;
use Illuminate\Support\Facades\Route;

Route::get('journal', function () {
    return view('admin.page.journal');
});

Route::get('rfid', function () {
    return view('admin.page.user.rfid');
});

Route::get('reject', function (){
    return view('admin.page.rejected.index');
});


Route::get('picket' , [PicketController::class , 'index']);
Route::get('report', function (){
    return view('admin.page.picket.report');
});
