<?php

use Illuminate\Support\Facades\Route;

Route::delete('/presentations/{presentation}', [\App\Http\Controllers\HummataskTeamController::class, 'destroy'])->name('presentations.destroy');
