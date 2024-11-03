<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HummataskTeamController;

Route::put('presentation/update/{presentation}', [HummataskTeamController::class, 'updatePresentation'])->name('presentation-detail.update');
Route::delete('/presentations/{presentation}', [HummataskTeamController::class, 'destroy'])->name('presentations.destroy');
