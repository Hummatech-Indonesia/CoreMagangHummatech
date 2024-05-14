<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\FaceController;
use App\Http\Controllers\Api\JournalController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/ApiLogin', [AuthLoginController::class, 'ApiLogin']);
Route::get('zoom_schedule' , [DashboardController::class , 'index']);
Route::post('callback', [TransactionController::class, 'callback']);
Route::middleware('auth:sanctum')->group(function () {
    Route::put('journal/update/{journal}' , [JournalController::class , 'update']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('profile' , [ProfileController::class , 'index']);
    Route::get('journals' , [JournalController::class , 'index']);
    Route::get('journals/detail/{id}' , [JournalController::class , 'show']);
    Route::post('journal' , [JournalController::class , 'store']);
    Route::get('mentorStudent',[DashboardController::class, 'mentorStudent']);
});
Route::post('sync', [AttendanceController::class, 'sync']);
Route::get('students', [StudentController::class, 'getStudents']);
Route::get('/limit', [AttendanceController::class, 'maxlate']);
Route::get('entry-time', [AttendanceController::class, 'entryTime']);
Route::get('face', [FaceController::class, 'index']);
Route::get('course' , [CourseController::class , 'index']);
