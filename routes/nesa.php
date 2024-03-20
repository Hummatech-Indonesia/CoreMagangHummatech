<?php

use App\Http\Controllers\Admin\PicketController;
use App\Http\Controllers\Admin\AdminJournalController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('journal', [AdminJournalController::class, 'index']);


Route::get('rfid', function () {
    return view('admin.page.user.rfid');
});

Route::get('reject', function (){
    return view('admin.page.rejected.index');
});


Route::get('picket' , [PicketController::class , 'index']);
Route::post('picket/store',[PicketController::class,'store'])->name('picket.store');
Route::post('picket/{picket}',[PicketController::class,'update'])->name('picket.update');



Route::get('report', function (){
    return view('admin.page.picket.report');
});

Route::get('product',[ProductController::class,'index']);
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');


Route::get('student/absensi', function (){
    return view('mentor.absensi.index');
});

Route::get('student/journal', function (){
    return view('mentor.journal.index');
});

Route::get('student', function (){
    return view('mentor.student.index');
});
