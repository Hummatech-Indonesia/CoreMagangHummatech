<?php

use Illuminate\Support\Facades\Route;

Route::post('submit-presentation',[\App\Http\Controllers\HummataskTeamController::class,'store'])->name('submit-presentation');
