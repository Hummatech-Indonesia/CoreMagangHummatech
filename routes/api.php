<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\FaceController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
Route::post('/ApiLogin', [AuthLoginController::class, 'ApiLogin']);
Route::get('zoom_schedule' , [DashboardController::class , 'index']);
Route::post('callback', [TransactionController::class, 'callback']);
Route::middleware('auth')->group(function () {
    Route::get('users', [UserController::class, 'index']);
});
Route::post('sync', [AttendanceController::class, 'sync']);
Route::get('student', [StudentController::class, 'getStudents']);
Route::get('entry-time', [AttendanceController::class, 'entryTime']);
Route::get('face', [FaceController::class, 'index']);
Route::get('course' , [CourseController::class , 'index']);
