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
Route::get('report', function (){
    return view('admin.page.picket.report');
});

Route::get('product',[ProductController::class,'index']);
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');


