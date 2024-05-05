<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\FaceController;

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['web']], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('custom.login');
});

Route::middleware('auth')->group(function () {
    Route::get('users', [UserController::class, 'index']);
});
Route::post('sync', [AttendanceController::class, 'sync']);
Route::get('student', [StudentController::class, 'getStudents']);
Route::get('entry-time', [AttendanceController::class, 'entryTime']);
Route::get('face', [FaceController::class, 'index']);
Route::get('course' , [CourseController::class , 'index']);
