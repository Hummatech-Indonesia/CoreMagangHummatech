<?php

use App\Http\Controllers\Mentor\ProjectSubmissionController;
use Illuminate\Support\Facades\{Auth, Route};
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

use App\Enum\RolesEnum;
use App\Http\Controllers\{
    StudentTaskController,
    HummataskTeamController,
    ReportStudentController,
    MentorController,
    ChallengeController,
    LimitsController,
    JournalController,
    StudentController,
    VoucherController,
    DataAdminController,
    StatementController,
    LetterheadController,
    TransactionController,
    SubscriptionController,
    VoucherSubmitController,
    OrderController,
    AppointmentOfAmentorController,
    AttendanceController,
    AttendanceRuleController,
    CategoryProjectController,
    CourseAssignmentController,
    LandingController,
    DataCOController,
    FaceController,
    InstitutionController,
    NotePicketController,
    PermissionController,
    ProductController,
    SignatureCOController,
    StudentChallengeController,
    StudentCourseController,
    StudentProgressController,
    SubmitTaskController,
    TaskController,
    TaskSubmissionController
};

use App\Http\Controllers\Admin\{
    AdminController,
    AdminAbsentController,
    AdminJournalController,
    ApprovalController,
    AdminMentorController,
    AdminStudentController,
    AdminStudentTeamController,
    DivisionController,
    DivisionPlacementController,
    MentorPlacementController,
    PicketController,
    PicketingReportController,
    WarningLetterController,
    ResponseLetterController,
    RfidController,
    StudentRejectedController,
    StudentProgressPresentationController,
    StudentProgressProjectController
};

use App\Http\Controllers\StudentOfline\{
    PicketOfflineController,
    CourseOfflineController,
    StudentOflineController
};

use App\Http\Controllers\StudentOnline\{
    CourseController,
    ZoomScheduleController,
    StudentOnlineController
};

use App\Http\Controllers\Mentor\AssessmentController;

use App\Http\Controllers\PresentationController;
use App\Http\Controllers\CourseController as AdminCourseController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\SubCourseController;


# ==================================================== Homepage Group Route ===================================================
Route::get('/', [LandingController::class, 'index']);
Route::get('/hummatech/{id}', [SignatureCOController::class, 'index']);


# ================================================ Authentication Routes Group ================================================
Auth::routes();

# Register
Route::post('/register/post', [StudentController::class, 'store']);

# Statement
Route::get('statement-self', [StatementController::class, 'self'])->name('statement-self');
Route::get('statement-parent', [StatementController::class, 'parent'])->name('statement-parent');

# ================================================ Administrator Route Group ==================================================
Route::prefix('administrator')->name(RolesEnum::ADMIN->value)->group(function () {

    # Dashboard Home
    Route::get('/', [AdminController::class, 'index'])->name('.dashboard.home');

    # Data Admin
    Route::put('data-admin/update/{datauser}', [DataAdminController::class, 'update'])->name('.data-admin.update');

    # Data CEO
    Route::post('dataceo/store', [DataCOController::class, 'store'])->name('.data-ceo.store');
    Route::put('dataceo/update/{dataAdmin}', [DataCOController::class, 'update'])->name('.data-ceo.update');

    # Journals
    Route::get('journal', [AdminJournalController::class, 'index']);

    # Announcement
    Route::get('announcement', function () {
        return view('admin.page.announcement.index');
    })->name('.announcement');

    # Presentations
    Route::get('presentation', [PresentationController::class, 'show'])->name('.presentation');

    # Institutions
    Route::resource('institution', InstitutionController::class)->except(['show', 'create', 'edit']);

    # Rule Attendance
    Route::post('attendance-rule/store', [AttendanceRuleController::class, 'store'])->name('.attendance-rule.store');

    # Course Details
    Route::get('assignment/{courseAssignment}', [SubmitTaskController::class, 'index'])->name('.assignment.submit-task');
    Route::get('/course/detail/{course}', [AdminCourseController::class, 'show'])->name('.course.detail');

    Route::delete('/subcourse/delete/{subCourse}', [SubCourseController::class, 'destroy'])->name('.subCourse.destroy');
    Route::get('/subcourse/detail/{subCourse}', [SubCourseController::class, 'show'])->name('.subCourse.detail');
    Route::put('/subcourse/edit/{subCourse}', [SubCourseController::class, 'update'])->name('.subCourse.update');

    Route::post('/task/store', [TaskController::class, 'store'])->name('.task.store');

    Route::post('course-assignment/{course}', [CourseAssignmentController::class, 'store'])->name('.course-assignment.store');
    Route::delete('course-assignment/{courseAssignment}', [CourseAssignmentController::class, 'destroy'])->name('.course-assignment.destroy');



    Route::prefix('absent')->name('.absent.')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('index');
        Route::patch('max-late', [AttendanceController::class, 'storeMaxLate'])->name('maxlate.store');
        Route::get('export/excel', [AdminAbsentController::class, 'export_excel'])->name('export.excel');
    });

    Route::prefix('permission')->name('.permission.')->group(function () {
        Route::get('/', [PermissionController::class, 'index']);
        Route::put('update/{permission}', [PermissionController::class, 'updateApproval'])->name('approval.izin');
        Route::put('update/reject/{permission}', [PermissionController::class, 'updateApprovalReject'])->name('approval.reject');
        Route::delete('delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');
    });

    Route::prefix('product')->name('.product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('approval')->name('.approval.')->group(function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('index');
        Route::put('accept/{student}', [ApprovalController::class, 'accept'])->name('accept');
        Route::put('accept-multiple', [ApprovalController::class, 'acceptMultiple'])->name('acceptMultiple');
        Route::put('decline/{student}', [ApprovalController::class, 'decline'])->name('approval.decline');
        Route::delete('delete/{student}', [ApprovalController::class, 'destroy'])->name('approval.delete');
    });

    Route::prefix('warning-letter')->name('.warning-letter.')->group(function () {
        Route::get('/', [WarningLetterController::class, 'index'])->name('warning-letter.index');
        Route::post('store', [WarningLetterController::class, 'store'])->name('warning-letter.store');
        Route::get('show/{WarningLetter}', [WarningLetterController::class, 'show'])->name('warning-letter.show');
        Route::delete('delete/{WarningLetter}', [WarningLetterController::class, 'destroy'])->name('warning-letter.delete');
    });

    Route::prefix('voucher')->name('.voucher.')->group(function () {
        Route::get('/', [VoucherController::class, 'index'])->name('voucher.index');
        Route::post('/store', [VoucherController::class, 'store'])->name('voucher.store');
        Route::delete('delete/{voucher}', [VoucherController::class, 'destroy'])->name('voucher.delete');
    });

    Route::prefix('response-letter')->name('.response-letter.')->group(function () {
        Route::get('/', [ResponseLetterController::class, 'index'])->name('response-letter.index');
        Route::get('show/student/{responseLetter}', [ResponseLetterController::class, 'show'])->name('response-letter.show');
    });

    Route::prefix('online-student')->name('.online-student.')->group(function () {
        Route::get('mentor-placement', [MentorPlacementController::class, 'index'])->name('placement.index');
        Route::post('mentor-placement/post/{student}', [MentorPlacementController::class, 'store'])->name('placement.update');
        Route::put('mentor-placement/edit/{student}', [MentorPlacementController::class, 'update'])->name('placement.delete');
    });

    Route::prefix('appointmentofmentor')->name('.appointmentofmentor.')->group(function () {
        Route::get('/', [AppointmentOfAmentorController::class, 'index']);
        Route::post('store', [AppointmentOfAmentorController::class, 'store']);
        Route::delete('delete/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'destroy']);
        Route::put('update/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'update']);
    });

    Route::prefix('menu-siswa')->name('.menu-siswa.')->group(function () {
        Route::get('/', [AdminStudentController::class, 'index'])->name('student.index');
        Route::get('create', [AdminStudentController::class, 'create'])->name('student.create');
        Route::put('administrator/menu-siswa/reset-password/{user}', [AdminStudentController::class, 'reset'])->name('student.update');
        Route::put('update/{student}', [AdminStudentController::class, 'update']);
        Route::get('face/{student}', [AdminStudentController::class, 'face'])->name('student.show');
        Route::delete('delete/{student}', [AdminStudentController::class, 'destroy'])->name('student.delete');
        Route::put('banned/{student}', [AdminStudentController::class, 'banned'])->name('student.banned');
        Route::put('division-change/{student}', [AdminStudentController::class, 'divisionchange'])->name('student.divisionchange');
        Route::put('students-banned/Open/{student}', [StudentController::class, 'Openbanned'])->name('students.banned.open');
        Route::get('manage-session', [AdminStudentController::class, 'manageSession'])->name('student.managesession');
        Route::get('manage-session/update/{session}', [StudentController::class, 'changeSessionStudent'])->name('change-session-student');
    });

    Route::prefix('students-banned')->name('.students-banned.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('email-user', [StudentController::class, 'emailUser'])->name('email-user');
        Route::delete('email-user/{user}', [StudentController::class, 'emailUserDelete'])->name('email-user.delete');
    });

    Route::prefix('faces')->name('.faces.')->group(function () {
        Route::get('/', [FaceController::class, 'index'])->name('index');
        Route::get('detail/{id}', [FaceController::class, 'show'])->name('detail');
        Route::post('create', [FaceController::class, 'store'])->name('create');
        Route::delete('delete/{student}', [FaceController::class, 'destroy'])->name('delete');
    });

    Route::prefix('students-rejected')->name('.students-rejected.')->group(function () {
        Route::get('/', [StudentRejectedController::class, 'index'])->name('index');
        Route::put('/{student}', [StudentRejectedController::class, 'accept'])->name('accept');
    });

    Route::prefix('menu-mentor')->name('.menu-mentor.')->group(function () {
        Route::get('/', [AdminMentorController::class, 'index'])->name('mentor.index');
        Route::post('store', [AdminMentorController::class, 'store'])->name('mentor.store');
        Route::put('update/{mentor}', [AdminMentorController::class, 'update'])->name('mentor.update');
        Route::delete('delete/{mentor}', [AdminMentorController::class, 'destroy'])->name('mentor.delete');
        Route::get('detail/{mentor}', [AdminMentorController::class, 'show'])->name('mentor.show');
    });

    Route::prefix('student-progress')->name('.student-progress.')->group(function () {
        Route::get('presentation',[StudentProgressPresentationController::class,'index'])->name('presentation');
        Route::get('presentation/{presentation}/detail',[StudentProgressPresentationController::class,'show'])->name('presentation.detail');
        Route::get('presentation/{presentation}/detail/revision',[StudentProgressPresentationController::class,'showRevision'])->name('presentation.detail.revision');
        Route::get('presentation/detaildone',[StudentProgressPresentationController::class,'show'])->name('presentation.detaildone');
        Route::get('project',[StudentProgressProjectController::class,'index'])->name('project');
        Route::get('project/detail/{project}',[StudentProgressProjectController::class,'show'])->name('project.detail');
        Route::get('project/detail/{project}/revision',[StudentProgressProjectController::class,'showRevision'])->name('project.detail.revision');
    });

    Route::prefix('course')->name('.course.')->group(function () {
        Route::get('/', [AdminCourseController::class, 'index'])->name('home');
        Route::post('store', [AdminCourseController::class, 'store'])->name('store');
        Route::put('{course}', [AdminCourseController::class, 'update'])->name('course.update');
        Route::delete('delete/{course}', [AdminCourseController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('limit')->name('.limit.')->group(function () {
        Route::post('/', [LimitsController::class, 'store'])->name('store');
        Route::put('update/{limits}', [LimitsController::class, 'update'])->name('update');
    });

    Route::prefix('zoom-schedules')->name('.zoom-schedules.')->group(function () {
        Route::get('/', [ZoomScheduleController::class, 'index'])->name('home');
        Route::post('store', [ZoomScheduleController::class, 'store'])->name('store');
        Route::put('/{zoomSchedule}', [ZoomScheduleController::class, 'update'])->name('update');
        Route::delete('/{zoomSchedule}', [ZoomScheduleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('alumni-admin')->name('.alumni-admin.')->group(function () {
        Route::get('/', [AlumniController::class, 'index']);
        Route::post('store', [AlumniController::class, 'store'])->name('store');
        Route::delete('delete/{alumni}', [AlumniController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('category-project')->name('.category-project.')->group(function () {
        Route::get('/', [CategoryProjectController::class, 'index'])->name('index');
        Route::post('store', [CategoryProjectController::class, 'store'])->name('store');
        Route::patch('/{categoryProject}', [CategoryProjectController::class, 'update'])->name('update');
        Route::delete('/{categoryProject}', [CategoryProjectController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('division')->name('.division.')->group(function () {
        Route::get('/', [DivisionController::class, 'index'])->name('index');
        Route::post('store', [DivisionController::class, 'store'])->name('store');
        Route::patch('/{division}', [DivisionController::class, 'update'])->name('update');
        Route::delete('/{division}', [DivisionController::class, 'destroy'])->name('delete');
    });

    Route::prefix('offline-students')->name('.offline-students.')->group(function () {
        Route::get('division-placement', [DivisionPlacementController::class, 'index']);
        Route::post('division-placement/{student}', [DivisionPlacementController::class, 'divisionplacement'])->name('division-placement');
        Route::put('division-placement/update/{student}', [DivisionPlacementController::class, 'divisionchange'])->name('division-placement.update');
        Route::get('team', [AdminStudentTeamController::class, 'index'])->name('admin.team.index');
        Route::get('team/{slug}', [AdminStudentTeamController::class, 'show'])->name('admin.team.show');
        Route::get('presentation', [PresentationController::class, 'presentation']);
    });

    Route::prefix('rfid')->name('.rfid.')->group(function () {
        Route::get('/', [RfidController::class, 'index']);
        Route::patch('add/{student}', [RfidController::class, 'store']);
        Route::patch('update/{student}', [RfidController::class, 'update']);
    });


    Route::prefix('picket')->name('.picket.')->group(function () {
        Route::get('/', [PicketController::class, 'index']);
        Route::delete('/{picket}', [PicketController::class, 'destroy'])->name('delete');
        Route::post('store', [PicketController::class, 'store'])->name('store');
        Route::put('/{picket}', [PicketController::class, 'update'])->name('update');
        Route::post('note-picket/store', [NotePicketController::class, 'store'])->name('note.store');
        Route::put('note-picket/{notePicket}', [NotePicketController::class, 'update'])->name('note.update');
        Route::get('report', [PicketingReportController::class, 'index'])->name('report');
    });

})->middleware(['roles:administrator', 'auth']);

# ================================================ Offline Student Route Group ================================================
Route::prefix('student-offline')->name(RolesEnum::OFFLINE->value.".")->group(function () {
    # Home
    Route::get('/', [StudentOflineController::class, 'index'])->name('home');

    # Courses
    Route::get('my-course', [StudentOflineController::class, 'myCourse'])->name('my-course');
    Route::get('course/{course}', [CourseController::class, 'detailOffline'])->name('course.detail');
    Route::get('course/{course}/sub-course/{subCourse}', [CourseController::class, 'offlineSubCourseDetail'])->name('sub-course.detail');
    Route::get('course/{course}/assignment/{courseAssignment}', [CourseController::class, 'offlineDetailAssignment'])->name('assignment.detail');
    Route::get('/course', [CourseOfflineController::class, 'index'])->name('course');
    Route::get('/course/detail/{course}', [CourseOfflineController::class, 'show'])->name('materi.detail');
    Route::get('/course/detail/learn-more/{subCourse}', [CourseOfflineController::class, 'showSub'])->name('submateri.detail');

    # Divisions
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('class.division');

    # Attendances
    Route::get('absensi', [AttendanceController::class, 'attendanceOffline'])->name('attendances');

    # Challenges
    Route::get('challenge', [StudentChallengeController::class, 'index'])->name('challenge');

    # Transaction
    Route::get('transaction/topUp', function () {
        return view('student_offline.transaction.topUp_history');
    })->name('transactions');
    Route::get('transaction/history', function () {
        return view('student_offline.transaction.transaction_history');
    })->name('transaction.history');
    Route::get('others/rules', function () {
        return view('student_offline.others.rules');
    })->name('rules');

    # Purchase
    Route::get('purchase', [CourseOfflineController::class, 'shopcourse'])->name('purchase');
    Route::get('purchase/detail/{id}', [CourseOfflineController::class, 'shopCourseDetail'])->name('purchase.detail');

    # Others
    Route::get('/course/detail/answer-detail', function () {
        return view('student_offline.course.answer-detail');
    })->name('answer');

    # Certificate
    Route::get('certificate', function () {
        return view('student_offline.certificate.index');
    })->name('certificate');

    #Journal
    Route::get('data/journal', [JournalController::class, 'index'])->name('journal.index');
    Route::put('journal/{journal}', [JournalController::class, 'update'])->name('journal.update');

    # Dashboard-Task-Presentation
    Route::get('dashboard/task', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.task.index');
    Route::get('dashboard/task/detail/{project}', [\App\Http\Controllers\ProjectController::class, 'detailProject'])->name('project.detail');
    Route::get('dashboard/task/detail/{project}/presentation', [\App\Http\Controllers\ProjectController::class, 'presentationProject'])->name('project.presentation');
    Route::post('dashboard/task/detail/{project}/presentation', [\App\Http\Controllers\ProjectController::class, 'storePresentation'])->name('project.presentation.save');
    Route::get('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'revisionProject'])->name('project.presentation.revision');
    Route::put('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'changeStatusRevision'])->name('project.presentation.revision.changestatus');
    Route::post('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'addRevision'])->name('project.presentation.revision.saveRevision');
    Route::get('dashboard/task/management', [\App\Http\Controllers\ProjectController::class, 'managementProject'])->name('project.management');

    Route::prefix('task-offline')->name('task-offline.')->group(function () {
        Route::get('/', [StudentTaskController::class, 'index'])->name('index');
        Route::post('store', [StudentTaskController::class, 'store'])->name('store');
        Route::patch('task/update/{studentTask}', [StudentTaskController::class, 'update'])->name('update');
    });

    Route::prefix('letterhead')->name('letterhead.')->group(function () {
        Route::get('/', [LetterheadController::class, 'indexOffline']);
        Route::post('letter-head', [LetterheadController::class, 'store'])->name('store');
        Route::put('letter-head/{letterhead}', [LetterheadController::class, 'update'])->name('update');
        Route::delete('letter-head/{letterhead}', [LetterheadController::class, 'destroy'])->name('delete');
    });

    Route::prefix('others')->name('others.')->group(function () {
        Route::get('student', [ReportStudentController::class, 'index']);
        Route::post('student/report', [ReportStudentController::class, 'store'])->name('report.store');
        Route::get('picket', [PicketOfflineController::class, 'index'])->name('.picket');
        Route::post('permission', [PermissionController::class, 'store'])->name('.permission.store');
    });

    Route::prefix('picket-report')->name('picket-report.')->group(function () {
        Route::post('/', [PicketingReportController::class, 'store'])->name('store');
        Route::put('/{picketingReport}', [PicketingReportController::class, 'update'])->name('update');
        Route::delete('/{picketingReport}', [PicketingReportController::class, 'destroy'])->name('.delete');
    });

    Route::prefix('challenge')->name('challenge.')->group(function () {
        Route::post('/', [StudentChallengeController::class, 'store']);
        Route::put('/{studentChallenge}', [StudentChallengeController::class, 'update']);
    });

})->middleware(["roles:student-offline", 'auth']);

# ================================================ Online Student Route Group =================================================
Route::prefix('student-online')->name(RolesEnum::ONLINE->value)->group(function () {
    # Home
    Route::get('/', [StudentOnlineController::class, 'index'])->name('.home');

    # Attendences
    Route::get('absensi', [AttendanceController::class, 'attendanceOnline'])->name('.attendances');

    # Courses
    Route::controller(CourseController::class)->middleware('subsrcribed')->group(function () {
        Route::get('/materi', 'index')->name('.course');
        Route::get('/materi/{course}', 'detail')->name('.course.detail');
        Route::get('/materi/{course}/course/{subCourse}', 'subCourseDetail')->name('.course.subcourse');
        Route::get('course/{course}/assignment/{courseAssignment}', 'detailAssignment')->name('.course.assignment');
    });

    # Task
    Route::controller(TaskSubmissionController::class)->name('.tasksubmit')->prefix('/tugas')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{task}', 'create')->name('.detail');
        Route::get('/{task}/download/{taskSubmission}', 'download')->name('.download');
        Route::post('/submit', 'store')->name('.submit');
    });
    # LetterHead
    Route::get('letterhead', [LetterheadController::class, 'index'])->name('.letterhead');
    Route::post('letterhead/store', [LetterheadController::class, 'store'])->name('.letterhead.store');

    #Zoom
    Route::get('/meeting', [ZoomScheduleController::class, 'indexStudent'])->name('.zoom-meeting.indexStudent');

    # Challenges
    Route::get('challenge', [StudentChallengeController::class, 'showOnline']);
    Route::post('challenge/store', [StudentChallengeController::class, 'store'])->name('.challenge_online.store');
    Route::put('challenge/update/{studentChallenge}', [StudentChallengeController::class, 'update'])->name('.challenge_online.update');

})->middleware(['roles:siswa-online', 'auth']);

# Jurnal
Route::get('jurnal/export/pdf', [JournalController::class, 'DownloadPdf'])->name('.journal.download');

# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================

#===================================================== Mentor =================================================================
Route::prefix('mentor')->name(RolesEnum::MENTOR->value.".")->group(function () {
    # Home
    Route::get('/', [\App\Http\Controllers\Mentor\DashboardController::class, 'index'])->name('home');
    Route::get('/presentation', [PresentationController::class, 'mentorshow'])->name('presentation');
    Route::get('/project-submissions', [ProjectSubmissionController::class, 'index'])->name('project-submissions.index');
    Route::get('/project-submissions/{project}/detail', [ProjectSubmissionController::class, 'show'])->name('project-submissions.show');
    Route::patch('/project-submissions/{project}/accept', [ProjectSubmissionController::class, 'accept'])->name('project-submissions.accept');
    Route::put('/project-submissions/{project}/reject', [ProjectSubmissionController::class, 'reject'])->name('project-submissions.reject');
    Route::get('/project-submissions/{project}/revision', [ProjectSubmissionController::class, 'revision'])->name('project-submissions.revision');

    # Mentor-Student
    Route::get('/student', [StudentController::class, 'mentorStudent']);
});

#================================================= End Mentor ====================================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    # Subscription Route
    Route::controller(SubscriptionController::class)->prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/process', 'subscribeAddCartProcess')->name('process');
    });

    # Voucher Subscription Apply
    Route::controller(VoucherSubmitController::class)->prefix('voucher')->name('voucher.')->group(function () {
        Route::post('apply', 'apply')->name('apply');
        Route::post('revoke', 'revoke')->name('revoke');
    });

    # Course Buy
    Route::get('courses', [StudentCourseController::class, 'index'])->name('student.course');
    Route::get('active-courses', [StudentCourseController::class, 'activeCourses'])->name('student.active-course');
    Route::get('courses/detail/{course}', [StudentCourseController::class, 'show'])->name('student.course.show');

    # Redirect based on roles
    Route::get('/home', function () {
        $roles = Auth::user()->roles->pluck('name');
        return redirect($roles[0]);
    })->name('authenticated');
});

# Attendances
Route::post('store-absent', [AttendanceController::class, 'absentOnline'])->name('attendance.online.store');
Route::post('change-status-student', [AttendanceController::class, 'changeAttendanceStatus'])->name('attendance.change-status');
Route::post('store-absent-offline', [AttendanceController::class, 'absentOffline'])->name('attendance.offline.store');
Route::post('wfh/store', [AttendanceController::class, 'storeWorkFromHome'])->name('wfh.today');

# Transaction and Payment Routing
Route::post('transaction/save/{product}', [TransactionController::class, 'save'])->name('transaction.save');
Route::post('transaction/save-course/{course}', [TransactionController::class, 'saveCourse'])->name('transaction.save-course');
Route::get('transaction/checkout/{product}', [TransactionController::class, 'checkout'])->name('transaction-history.checkout');;
Route::get('transaction/checkout-course/{course}', [TransactionController::class, 'checkoutCourse'])->name('transaction.checkout-course');
Route::get('transaction', function () {
    return view('student_online_&_offline.transaction.index');
})->name('transaction-history.index');
Route::get('transaction/detail/{transaction}', [TransactionController::class, 'show'])->name('transaction-history.detail');
Route::get('transaction/detail-course/{transaction}', [TransactionController::class, 'showCourse'])->name('transaction-history.course.detail');

# Orders
Route::get('order', [OrderController::class, 'index'])->name('my-order')->middleware(['auth']);


Route::get('/aboutUs', function () {
    return view('landing.aboutUs');
});

Route::get('/alumniSiswa', [AlumniController::class, 'landing'])->name('alumni.siswa');
F
Route::get('/galeri', function () {
    return view('landing.galeri');
});

Route::get('/prosedur', function () {
    return view('landing.prosedur');
});

Route::get('/hubungi', function () {
    return view('landing.hubungi');
});

# Presentations
Route::post('submit-presentation', [\App\Http\Controllers\HummataskTeamController::class, 'store'])->name('submit-presentation');
Route::put('mentor/presentation/changestatus', [\App\Http\Controllers\PresentationController::class, 'changeStatus'])->name('presentation.changeStatus');
Route::put('mentor/presentation/done/{presentation}', [\App\Http\Controllers\PresentationController::class, 'presentationDone'])->name('presentation.presentationDone');


# Dashboard-Task-Project
Route::post('dashboard/task/submit-project', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.submit');

# Dashboard-Project-Task
Route::prefix('dashboard/task')->group(function () {
    Route::prefix('project')->group(function () {
        Route::delete('/{project}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
    });
});

# Team
Route::post('team/store', [HummataskTeamController::class, 'store'])->name('team.store');
Route::put('team/update/{hummataskTeam}', [HummataskTeamController::class, 'update'])->name('team.update');

Route::get('administrator/course/detail', function () {
    return view('admin.page.course.detail');
});
Route::get('administrator/course/detail/sub-course', function () {
    return view('admin.page.course.sub-course.index');
});

# Offline-Task
Route::get('siswa-offline/task', [StudentTaskController::class, 'index']);
Route::post('siswa-offline/task/store', [StudentTaskController::class, 'store'])->name('task-offline.store');
Route::patch('siswa-offline/task/update/{studentTask}', [StudentTaskController::class, 'update'])->name('task-offline.update');

# Offline-LetterHead
Route::get('siswa-offline/letter-head', [LetterheadController::class, 'indexOffline']);
Route::post('letter-head', [LetterheadController::class, 'store'])->name('letterhead.store');
Route::put('letter-head/{letterhead}', [LetterheadController::class, 'update'])->name('letterhead.update');
Route::delete('letter-head/{letterhead}', [LetterheadController::class, 'destroy'])->name('letterhead.delete');

# Offline-Report
Route::get('siswa-offline/others/student', [ReportStudentController::class, 'index']);
Route::post('siswa-offline/others/student/report', [ReportStudentController::class, 'store'])->name('report.store');

# Offline-Picket-Report
Route::post('picket-report', [PicketingReportController::class, 'store'])->name('picket-report.store');
Route::put('picket-report/{picketingReport}', [PicketingReportController::class, 'update'])->name('picket-report.update');
Route::delete('picket-report/{picketingReport}', [PicketingReportController::class, 'destroy'])->name('picket-report.delete');

# Offline-Challenges
Route::post('siswa-offline/challenge', [StudentChallengeController::class, 'store']);
Route::put('siswa-offline/challenge/{studentChallenge}', [StudentChallengeController::class, 'update']);

# Online-Journals
Route::get('siswa-online/jurnal', [JournalController::class, 'studentOnline']);

# Online-Materi-Details
Route::get('siswa-online/materi/detail', function () {
    return view('student_online.course.detail');
});
Route::get('siswa-online/materi/detail/detail-jawaban', function () {
    return view('student_online.course.answer-detail');
});
Route::get('siswa-online/materi/detail/pelajari', function () {
    return view('student_online.course.learn-more');
});

# Top-Up
Route::get('top-up', function () {
    return view('admin.page.approval.top-up');
});

# Alumni
Route::get('alumni', function () {
    return view('admin.page.user.alumni');
});

# PIC
Route::get('person-in-charge', function () {
    return view('admin.page.user.person-in-charge');
});
Route::get('person-in-charge/detail', function () {
    return view('admin.page.user.person-in-charge-detail');
});

# Task
Route::post('create/task', [TaskController::class, 'store']);
Route::put('update/task/{task}', [TaskController::class, 'update']);
Route::delete('delete/task/{task}', [TaskController::class, 'destroy']);

# Materi
Route::post('create/materi', [CourseController::class, 'store']);

# Sub materi
Route::post('create/sub-materi/{course}', [SubCourseController::class, 'store']);
Route::get('detail/pelajari/{subCourse}', [SubCourseController::class, 'show']);
Route::get('show/materi/{course}', [CourseController::class, 'show']);

# Submit-Task
Route::prefix('submit-task-answer')->name('submit.task.answer.')->group(function () {
    Route::post('store/{courseAssignment}', [SubmitTaskController::class, 'store'])->name('store');
    Route::get('{submitTask}', [SubmitTaskController::class, 'show'])->name('show');
    Route::put('{submitTask}', [SubmitTaskController::class, 'update'])->name('update');
    Route::delete('{submitTask}', [SubmitTaskController::class, 'destroy'])->name('destroy');
    Route::patch('update-status/{submitTask}', [SubmitTaskController::class, 'updateStatus'])->name('update-status');
    Route::post('download/{submitTask}', [SubmitTaskController::class, 'download'])->name('download');
});

# Create-Journals
Route::post('create/jurnal', [JournalController::class, 'store']);

# Permissions
Route::get('permission', function () {
    return view('admin.page.approval.permision');
});

#Timetable
Route::get('timetable', function () {
    return view('mentor.zoomschedule');
});

# Challenges
Route::get('challenge', [CourseController::class, 'index']);

# Subscribe
Route::get('student-offline/langganan', function () {
    return view('student_offline.langganan.index');
});

# Reject
Route::get('reject', function () {
    return view('admin.page.rejected.index');
});

# Attendences
Route::get('student/absensi', [MentorController::class, 'indexAttendances']);

# Journals
Route::get('student/journal', [JournalController::class, 'index']);

# Mentor-Challenges
Route::get('mentor/challenge', [ChallengeController::class, 'index']);
Route::post('mentor/challenge/store', [ChallengeController::class, 'store'])->name('challenge.store');
Route::put('mentor/challenge/{challenge}', [ChallengeController::class, 'update'])->name('challenge.update');
Route::delete('mentor/challenge/delete/{challenge}', [ChallengeController::class, 'destroy'])->name('challenge.destroy');

# Mentor-Challenge-Details
Route::get('mentor/challenge/detail', function () {
    return view('mentor.challange.detail');
});
Route::get('mentor/challenge/challenge-detail/{challenge}', [AssessmentController::class, 'showChallengeStudent'])->name('tantangan.detail');

# Mentor-Assessment
Route::get('mentor/assessment', [AssessmentController::class, 'index']);
Route::get('mentor/assessment/task-detail/{task}', [AssessmentController::class, 'show'])->name('task.detail');
Route::patch('mentor/assessment/update/{studentTask}', [AssessmentController::class, 'update'])->name('task-offline.assessment');
Route::get('mentor/assessment/challenge-detail/{challenge}', [AssessmentController::class, 'showChallenge'])->name('challenge.detail');
Route::patch('mentor/assessment/update/challenge/{studentChallenge}', [AssessmentController::class, 'updateChallenge'])->name('challenge.assessment');

# Presentations
Route::put('presentation/update', [HummataskTeamController::class, 'updatePresentation'])->name('presentation-detail.update');
Route::delete('/presentations/{presentation}', [HummataskTeamController::class, 'destroy'])->name('presentations.destroy');

Route::get('/presentasi', function () {
    return view('Hummatask.detail-presentation');
});
//Route::get('/revision', function () {
//    return view('Hummatask.revision');
//});
Route::get('/approval-project', function () {
    return view('mentor.approval-project.index');
});

//require_once _DIR_ . '/femas.php';
//require_once _DIR_ . '/kader.php';
//require_once _DIR_ . '/farah.php';
//require_once _DIR_ . '/nesa.php';
//require_once _DIR_ . '/alul.php';
//require_once _DIR_ . '/sano.php';
