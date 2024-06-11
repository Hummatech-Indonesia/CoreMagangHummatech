<?php

use App\Http\Controllers\Api\AdminMentorController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\FaceController;
use App\Http\Controllers\Api\JournalController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AppointmentOfMentor;
use App\Http\Controllers\Api\HummataskPresentationController;
use App\Http\Controllers\Api\HummataskTeamController;
use App\Http\Controllers\Api\MentorController;
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
    Route::post('permision' , [PermissionController::class ,'store']);
    Route::get('profile' , [ProfileController::class , 'index']);
    Route::get('journals' , [JournalController::class , 'index']);
    Route::post('journal' , [JournalController::class , 'store']);
    Route::get('mentorStudent',[DashboardController::class, 'mentorStudent']);
    Route::get('journals/detail/{id}' , [JournalController::class , 'show']);
    Route::get('attendace' , [AttendanceController::class , 'attendanceOffline']);
    Route::get('countAttendace' , [AttendanceController::class , 'count']);
    Route::get('mentor_student' , [AdminMentorController::class ,'show']);
    Route::get('student/{student}' , [UserController::class , 'show']);
    Route::get('mentor-journal' , [JournalController::class ,'journal']);
    Route::get('course_mentor' , [AppointmentOfMentor::class , 'index']);
    Route::get('count_mentor' , [DashboardController::class , 'count']);

    Route::get('course/task/{course}', [CourseController::class, 'courseAssignment']);

    // api seluruh siswa
    Route::get('active-courses', [CourseController::class, 'activeCourses']);
    Route::post('attendance', [AttendanceController::class, 'storeAttendance']);
    Route::get('check-wfh', [AttendanceController::class, 'checkWfh']);
    Route::get('nonactive-courses', [CourseController::class, 'nonactiveCourses']);

    Route::prefix('hummatask')->group(function () {
        Route::post('team', [HummataskTeamController::class, 'store']);
        Route::put('team/{hummataskTeam}', [HummataskTeamController::class, 'update']);
        Route::get('team/member/{hummataskTeam}', [HummataskTeamController::class, 'member']);
        Route::get('team/{hummataskTeam}', [HummataskTeamController::class, 'show']);
        Route::get('team', [ProfileController::class, 'studentAllTeam']);
        Route::get('presentation/schedule', [HummataskPresentationController::class, 'schedule']);
        Route::post('presentation', [HummataskPresentationController::class, 'store']);
    });


    // api mentor
    Route::prefix('mentor')->group(function () {
        Route::get('student-offline', [MentorController::class, 'listStudentOffline']);
        Route::get('student-online', [MentorController::class, 'listStudentOnline']);
        Route::get('student-offline-attendances', [MentorController::class, 'studentOfflineAttendances']);
        Route::get('student-online-attendances', [MentorController::class, 'studentOnlineAttendances']);
        Route::get('journal-offline', [MentorController::class, 'studentJournalOffline']);
        Route::get('journal-online', [MentorController::class, 'studentJournalOnline']);
        Route::get('journals', [MentorController::class, 'studentJournal']);
        Route::get('courses', [MentorController::class, 'courses']);
    });
    Route::get('hummatask_team' , [ProfileController::class , 'hummataskteam']);
});
Route::post('sync', [AttendanceController::class, 'sync']);
Route::get('students', [StudentController::class, 'getStudents']);
Route::get('/limit', [AttendanceController::class, 'maxlate']);
Route::get('entry-time', [AttendanceController::class, 'entryTime']);
Route::get('face', [FaceController::class, 'index']);
Route::get('course' , [CourseController::class , 'index']);
