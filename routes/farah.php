<?php

use App\Http\Controllers\Admin\AdminAbsentController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminStudentTeamControlle;
use App\Http\Controllers\Admin\AdminStudentTeamController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DivisionPlacementController;
use App\Http\Controllers\Admin\PicketingReportController;
use App\Http\Controllers\Admin\RfidController;
use App\Http\Controllers\Admin\StudentRejectedController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\CategoryProjectController;
use App\Http\Controllers\HummataskTeamController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LetterheadController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportStudentController;
use App\Http\Controllers\StudentChallengeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentOnlineController;
use App\Http\Controllers\StudentTaskController;
use App\Http\Controllers\TaskSubmissionController;
use Illuminate\Support\Facades\Route;

// Route::get('division', [DivisionController::class, 'index'])->name('division.index');
// Route::post('division/store', [DivisionController::class, 'store'])->name('division.store');
// Route::patch('division/{division}', [DivisionController::class, 'update'])->name('division.update');
// Route::delete('division/{division}', [DivisionController::class, 'destroy'])->name('division.delete');

// Route::get('announcement', function() {
//     return view('admin.page.announcement.index');
// });


// Route::put('journal/{journal}', [JournalController::class, 'update']);
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
// Route::get('offline-students/division-placement', [DivisionPlacementController::class, 'index']);
// Route::post('offline-students/division-placement/{student}', [DivisionPlacementController::class ,'divisionplacement'])->name('division-placement');
// Route::put('offline-students/division-placement/update/{student}', [DivisionPlacementController::class ,'divisionchange'])->name('division-placement.update');

// Route::get('offline-students/team', [AdminStudentTeamController::class, 'index'])->name('admin.team.index');
// Route::get('offline-students/team/{slug}', [AdminStudentTeamController::class, 'show'])->name('admin.team.show');
// Route::get('offline-students/presentation', [PresentationController::class, 'index']);

Route::get('administrator/course/detail', function() {
    return view('admin.page.course.detail');
});
Route::get('administrator/course/detail/sub-course', function() {
    return view('admin.page.course.sub-course.index');
});

Route::get('siswa-offline/task', [StudentTaskController::class, 'index']);

Route::get('siswa-offline/letter-head', [LetterheadController::class, 'indexOffline']);
Route::post('letter-head', [LetterheadController::class, 'store'])->name('letterhead.store');
Route::put('letter-head/{letterhead}', [LetterheadController::class, 'update'])->name('letterhead.update');
Route::delete('letter-head/{letterhead}', [LetterheadController::class, 'destroy'])->name('letterhead.delete');

Route::get('siswa-offline/others/student', [ReportStudentController::class, 'index']);
Route::post('siswa-offline/others/student/report', [ReportStudentController::class, 'store'])->name('report.store');

Route::post('siswa-offline/task/store', [StudentTaskController::class, 'store'])->name('task-offline.store');
Route::patch('siswa-offline/task/update/{studentTask}', [StudentTaskController::class, 'update'])->name('task-offline.update');


Route::post('picket-report', [PicketingReportController::class, 'store'])->name('picket-report.store');
Route::put('picket-report/{picketingReport}', [PicketingReportController::class, 'update'])->name('picket-report.update');
Route::delete('picket-report/{picketingReport}', [PicketingReportController::class, 'destroy'])->name('picket-report.delete');

Route::post('siswa-offline/challenge',[StudentChallengeController::class,'store']);
Route::put('siswa-offline/challenge/{studentChallenge}',[StudentChallengeController::class,'update']);

// Route::get('students-rejected', [StudentRejectedController::class, 'index']);
// Route::put('students-rejected/{student}', [StudentRejectedController::class, 'accept']);

// Route::get('rfid', [RfidController::class, 'index']);
// Route::patch('rfid/add/{student}', [RfidController::class, 'store']);
// Route::patch('rfid/update/{student}', [RfidController::class, 'update']);

Route::post('team/store', [HummataskTeamController::class, 'store'])->name('team.store');
Route::put('team/update/{hummataskTeam}', [HummataskTeamController::class, 'update'])->name('team.update');
Route::get('dashboard/task', [HummataskTeamController::class, 'index']);
Route::get('hummateam/team/{slug}', [HummataskTeamController::class, 'show'])->name('team.show');
Route::delete('hummateam/team/{hummataskTeam}', [HummataskTeamController::class, 'destroy'])->name('team.delete');
Route::put('hummateam/team/{hummataskTeam}', [HummataskTeamController::class, 'updateOnStudent'])->name('team-student.update');
Route::post('solo-team/store', [HummataskTeamController::class, 'soloTeam'])->name('soloTeam.store');

// Route::get('administrator/category-project', [CategoryProjectController::class, 'index'])->name('category-project.index');
// Route::post('administrator/category-project/store', [CategoryProjectController::class, 'store'])->name('category-project.store');
// Route::patch('administrator/category-project/{categoryProject}', [CategoryProjectController::class, 'update'])->name('category-project.update');
// Route::delete('administrator/category-project/{categoryProject}', [CategoryProjectController::class, 'destroy'])->name('category-project.destroy');

Route::get('mentor/team', [HummataskTeamController::class, 'mentor']);
Route::get('mentor/team/{slug}', [HummataskTeamController::class, 'mentorShow'])->name('mentor.team-detail');

Route::get('hummateam/team/{slug}/submit-project', [ProjectController::class, 'index'])->name('project.index');
Route::post('hummateam/team/{slug}/submit-project', [ProjectController::class, 'store'])->name('project.store');

Route::get('mentor/project-submission', [ProjectController::class, 'mentor'])->name('project-submission.index');
Route::get('mentor/project-submission/{slug}', [ProjectController::class, 'showProjectSubmission'])->name('project-submission.detail');
Route::put('mentor/project-submission/{slug}/acc/{project}', [ProjectController::class, 'update'])->name('project-submission.acc');
Route::put('mentor/project-submission/{slug}', [ProjectController::class, 'projectFromMentor'])->name('project-submission-mentor.acc');

// Route::post('attendance-rule/store', [AttendanceRuleController::class, 'store'])->name('attendance-rule.store');
Route::patch('mentor/presentation/callback/{presentation}', [PresentationController::class, 'callback'])->name('mentor.callback');

Route::get('mentor/team/{slug}/edit', [HummataskTeamController::class, 'mentorEdit'])->name('mentor-team.edit');

Route::patch('hummateam/team/{slug}/add-repository/{project}', [ProjectController::class, 'addRepository'])->name('add.repository');
// Route::get('administrator/absent/export/excel', [AdminAbsentController::class, 'export_excel'])->name('attendance.admin.export.excel');
