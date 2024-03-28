<?php

use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DivisionPlacementController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LetterheadController;
use App\Http\Controllers\ReportStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentOnlineController;
use App\Http\Controllers\TaskSubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('division', [DivisionController::class, 'index'])->name('division.index');
Route::post('division/store', [DivisionController::class, 'store'])->name('division.store');
Route::patch('division/{division}', [DivisionController::class, 'update'])->name('division.update');
Route::delete('division/{division}', [DivisionController::class, 'destroy'])->name('division.delete');

Route::get('announcement', function() {
    return view('admin.page.announcement.index');
});

Route::get('absent', function() {
    return view('admin.page.absent.index');
});

Route::put('journal/{journal}', [JournalController::class, 'update']);
Route::get('siswa-online/jurnal', [JournalController::class, 'studentOnline']);

Route::get('siswa-online/materi/detail', function() {
    return view('student_online.course.detail');
});
Route::get('siswa-online/materi/detail/detail-jawaban', function() {
    return view('student_online.course.answer-detail');
});
Route::get('siswa-online/materi/detail/pelajari', function() {
    return view('student_online.course.learn-more');
});

Route::get('siswa-online/tugas', function() {
    return view('student_online.task.index');
});
Route::get('siswa-online/tugas/detail', function() {
    return view('student_online.task.detail');
});
Route::get('siswa-online/tugas/detail/detail-jawaban', function() {
    return view('student_online.task.answer-detail');
});

Route::get('top-up', function() {
    return view('admin.page.approval.top-up');
});
Route::get('alumni', function() {
    return view('admin.page.user.alumni');
});
Route::get('person-in-charge', function() {
    return view('admin.page.user.person-in-charge');
});
Route::get('person-in-charge/detail', function() {
    return view('admin.page.user.person-in-charge-detail');
});
Route::get('students-rejected', function() {
    return view('admin.page.user.students-rejected');
});
Route::get('students-banned', [StudentController::class , 'index']);
Route::get('offline-students/division-placement', [DivisionPlacementController::class, 'index']);
Route::post('offline-students/division-placement/{student}', [DivisionPlacementController::class ,'divisionchange'])->name('division-placement');
Route::get('offline-students/team', function() {
    return view('admin.page.offline-students.team.index');
});
Route::get('offline-students/team/detail', function() {
    return view('admin.page.offline-students.team.detail');
});
Route::get('offline-students/presentation', function() {
    return view('admin.page.offline-students.presentation.index');
});
// Route::get('administrator/course', function() {
//     return view('admin.page.course.index');
// });
Route::get('administrator/course/detail', function() {
    return view('admin.page.course.detail');
});
Route::get('administrator/course/detail/sub-course', function() {
    return view('admin.page.course.sub-course.index');
});

Route::get('siswa-offline/task', function(){
    return view('student_offline.task.index');
});

Route::get('siswa-offline/challenge', function(){
    return view('student_offline.challenge.index');
});
Route::get('siswa-offline/letter-head', [LetterheadController::class, 'indexOffline']);
Route::post('siswa-offline/letter-head', [LetterheadController::class, 'store'])->name('letterhead-offline.store');

Route::get('siswa-offline/others/student', [ReportStudentController::class, 'index']);
Route::post('siswa-offline/others/student/report', [ReportStudentController::class, 'store'])->name('report.store');

Route::post('siswa-offline/task/store', [TaskSubmissionController::class, 'store']);
