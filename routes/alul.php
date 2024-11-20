<?php

use Illuminate\Support\Facades\Route;

Route::post('submit-presentation',[\App\Http\Controllers\HummataskTeamController::class,'store'])->name('submit-presentation');
Route::put('mentor/presentation/changestatus',[\App\Http\Controllers\PresentationController::class,'changeStatus'])->name('presentation.changeStatus');
Route::put('mentor/presentation/done/{presentation}',[\App\Http\Controllers\PresentationController::class,'presentationDone'])->name('presentation.presentationDone');

Route::prefix('dashboard/task')->group(function (){
    Route::prefix('project')->group(function (){
       Route::delete('/{project}', [\App\Http\Controllers\ProjectController::class,'destroy'])->name('project.destroy');
    });
});
