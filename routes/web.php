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
Route::middleware(['roles:administrator', 'auth'])->group(function () {
    # Attendances
    Route::get('absent', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::patch('max-late', [AttendanceController::class, 'storeMaxLate'])->name('maxlate.store');

    # Products
    Route::get('product', [ProductController::class, 'index']);
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    # Dashboard Home
    Route::get('administrator', [AdminController::class, 'index'])->name('.home');

    # Data Admin
    Route::put('data-admin/update/{datauser}', [DataAdminController::class, 'update'])->name('data-admin.update');

    # Data CEO
    Route::post('dataceo/store', [DataCOController::class, 'store']);
    Route::put('dataceo/update/{dataAdmin}', [DataCOController::class, 'update']);

    # Approval
    Route::get('approval', [ApprovalController::class, 'index'])->name('.approval.index');
    Route::put('approval/accept/{student}', [ApprovalController::class, 'accept'])->name('approval.accept');
    Route::put('approval/accept-multiple', [ApprovalController::class, 'acceptMultiple'])->name('approval.acceptMultiple');
    Route::put('approval/decline/{student}', [ApprovalController::class, 'decline'])->name('approval.decline');
    Route::delete('approval/delete/{student}', [ApprovalController::class, 'destroy'])->name('approval.delete');

    # Warning letter
    Route::get('warning-letter', [WarningLetterController::class, 'index'])->name('warning-letter.index');
    Route::post('warning-letter/store', [WarningLetterController::class, 'store'])->name('warning-letter.store');
    Route::get('warning-letter/show/{WarningLetter}', [WarningLetterController::class, 'show'])->name('warning-letter.show');
    Route::delete('warning-letter/delete/{WarningLetter}', [WarningLetterController::class, 'destroy'])->name('warning-letter.delete');

    # Response letter
    Route::get('response-letter', [ResponseLetterController::class, 'index'])->name('response-letter.index');
    Route::get('show/student/{responseLetter}', [ResponseLetterController::class, 'show'])->name('response-letter.show');

    # Voucher
    Route::get('voucher', [VoucherController::class, 'index'])->name('voucher.index');
    Route::post('voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::delete('voucher/delete/{voucher}', [VoucherController::class, 'destroy'])->name('voucher.delete');

    # Mentor
    Route::get('menu-mentor', [AdminMentorController::class, 'index'])->name('mentor.index');
    Route::post('menu-mentor/store', [AdminMentorController::class, 'store'])->name('mentor.store');
    Route::put('menu-mentor/update/{mentor}', [AdminMentorController::class, 'update'])->name('mentor.update');
    Route::delete('menu-mentor/delete/{mentor}', [AdminMentorController::class, 'destroy'])->name('mentor.delete');
    Route::get('menu-mentor/detail/{mentor}', [AdminMentorController::class, 'show'])->name('mentor.show');
    # Mentor Placement
    Route::get('online-student/menotor-placement', [MentorPlacementController::class, 'index'])->name('placement.index');
    Route::post('online-student/menotor-placement/post/{student}', [MentorPlacementController::class, 'store'])->name('placement.update');
    Route::put('online-student/menotor-placement/edit/{student}', [MentorPlacementController::class, 'update'])->name('placement.delete');
    #AppointmentOfMentor
    Route::get('administrator/appointmentofmentor', [AppointmentOfAmentorController::class, 'index']);
    Route::post('administrator/appointmentofmentor/store', [AppointmentOfAmentorController::class, 'store']);
    Route::delete('administrator/appointmentofmentor/delete/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'destroy']);
    Route::delete('administrator/appointmentofmentor/delete/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'destroy']);
    Route::put('administrator/appointmentofmentor/update/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'update']);

    # Student
    Route::get('menu-siswa', [AdminStudentController::class, 'index'])->name('student.index');
    Route::get('menu-siswa/create', [AdminStudentController::class, 'create'])->name('student.create');
    Route::put('administrator/menu-siswa/reset-password/{user}', [AdminStudentController::class, 'reset'])->name('student.update');
    Route::put('menu-siswa/update/{student}', [AdminStudentController::class, 'update']);
    Route::get('menu-siswa/face/{student}', [AdminStudentController::class, 'face'])->name('student.show');
    Route::delete('menu-siswa/delete/{student}', [AdminStudentController::class, 'destroy'])->name('student.delete');
    Route::put('menu-siswa/banned/{student}', [AdminStudentController::class, 'banned'])->name('student.banned');
    Route::put('menu-siswa/division-change/{student}', [AdminStudentController::class, 'divisionchange'])->name('student.divisionchange');
    Route::put('students-banned/Open/{student}', [StudentController::class, 'Openbanned'])->name('students.banned.open');
    Route::get('menu-siswa/manage-session', [AdminStudentController::class, 'manageSession'])->name('student.managesession');
    Route::get('/menu-siswa/manage-session/update/{session}', [StudentController::class, 'changeSessionStudent'])->name('change-session-student');

    # Student Progress Presentation
    Route::get('student-progress/presentation',[StudentProgressPresentationController::class,'index']);
    // TODO nanti ini diganti by status yaa
    Route::get('student-progress/presentation/detaildone',[StudentProgressPresentationController::class,'show']);

    # Student Progress Project
    Route::get('student-progress/project',[StudentProgressProjectController::class,'index']);
    // TODO nanti ini diganti by status yaa
    Route::get('student-progress/project/detail',[StudentProgressProjectController::class,'show']);

    # Courses
    Route::get('administrator/course', [AdminCourseController::class, 'index']);
    Route::post('administrator/course/store', [AdminCourseController::class, 'store'])->name('course.store');
    Route::put('administrator/course/{course}', [AdminCourseController::class, 'update'])->name('course.update');
    Route::delete('administrator/course/delete/{course}', [AdminCourseController::class, 'destroy'])->name('course.destroy');

    # Course Details
    Route::get('assignment/{courseAssignment}', [SubmitTaskController::class, 'index'])->name('assignment.submit-task');
    Route::get('/administrator/course/detail/{course}', [AdminCourseController::class, 'show'])->name('course.detail');
    Route::delete('administrator/subcourse/delete/{subCourse}', [SubCourseController::class, 'destroy'])->name('subCourse.destroy');
    Route::get('/administrator/subcourse/detail/{subCourse}', [SubCourseController::class, 'show'])->name('subCourse.detail');
    Route::put('/administrator/subcourse/edit/{subCourse}', [SubCourseController::class, 'update'])->name('subCourse.update');
    Route::post('administrator/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::post('course-assignment/{course}', [CourseAssignmentController::class, 'store'])->name('course-assignment.store');
    Route::delete('course-assignment/{courseAssignment}', [CourseAssignmentController::class, 'destroy'])->name('course-assignment.destroy');

    # Registration Limit
    Route::post('limit', [LimitsController::class, 'store'])->name('limit.store');
    Route::put('limit/update/{limits}', [LimitsController::class, 'update'])->name('limit.update');
    # Student-Banned
    Route::get('students-banned', [StudentController::class, 'index']);
    Route::get('email-user', [StudentController::class, 'emailUser']);
    Route::delete('email-user/{user}', [StudentController::class, 'emailUserDelete']);

    # Faces
    Route::get('faces', [FaceController::class, 'index']);
    Route::get('faces/detail/{id}', [FaceController::class, 'show']);
    Route::post('faces/create', [FaceController::class, 'store']);
    Route::delete('faces/delete/{student}', [FaceController::class, 'destroy']);

    # Zoom Schedule
    Route::get('administrator/zoom-schedules', [ZoomScheduleController::class, 'index']);
    Route::post('administrator/zoom-schedules/store', [ZoomScheduleController::class, 'store'])->name('zoom-schedule.store');
    Route::put('administrator/zoom-schedules/{zoomSchedule}', [ZoomScheduleController::class, 'update'])->name('zoom-schedule.update');
    Route::delete('administrator/zoom-schedules/{zoomSchedule}', [ZoomScheduleController::class, 'destroy'])->name('zoom-schedule.destroy');

    # Journals
    Route::get('journal', [AdminJournalController::class, 'index']);

    # Admin-Alumni
    Route::get('/alumni-admin', [AlumniController::class, 'index'])->name('alumni.admin');
    Route::post('/alumni-admin/store', [AlumniController::class, 'store'])->name('alumni-admin.store');
    Route::delete('/alumni-admin/delete/{alumni}', [AlumniController::class, 'destroy'])->name('alumni-admin.destroy');

    # Announcement
    Route::get('announcement', function () {
        return view('admin.page.announcement.index');
    });

    # Admin Category-Project
    Route::get('administrator/category-project', [CategoryProjectController::class, 'index'])->name('category-project.index');
    Route::post('administrator/category-project/store', [CategoryProjectController::class, 'store'])->name('category-project.store');
    Route::patch('administrator/category-project/{categoryProject}', [CategoryProjectController::class, 'update'])->name('category-project.update');
    Route::delete('administrator/category-project/{categoryProject}', [CategoryProjectController::class, 'destroy'])->name('category-project.destroy');

    # Divisions
    Route::get('division', [DivisionController::class, 'index'])->name('division.index');
    Route::post('division/store', [DivisionController::class, 'store'])->name('division.store');
    Route::patch('division/{division}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('division/{division}', [DivisionController::class, 'destroy'])->name('division.delete');

    # Divisions-Placement
    Route::get('offline-students/division-placement', [DivisionPlacementController::class, 'index']);
    Route::post('offline-students/division-placement/{student}', [DivisionPlacementController::class, 'divisionplacement'])->name('division-placement');
    Route::put('offline-students/division-placement/update/{student}', [DivisionPlacementController::class, 'divisionchange'])->name('division-placement.update');

    # Students-Team
    Route::get('offline-students/team', [AdminStudentTeamController::class, 'index'])->name('admin.team.index');
    Route::get('offline-students/team/{slug}', [AdminStudentTeamController::class, 'show'])->name('admin.team.show');
    Route::get('offline-students/presentation', [PresentationController::class, 'index']);

    #Rfid
    Route::get('rfid', [RfidController::class, 'index']);
    Route::patch('rfid/add/{student}', [RfidController::class, 'store']);
    Route::patch('rfid/update/{student}', [RfidController::class, 'update']);

    # Student-Rejected
    Route::get('students-rejected', [StudentRejectedController::class, 'index']);
    Route::put('students-rejected/{student}', [StudentRejectedController::class, 'accept']);

    # Attendances-Rule
    Route::post('attendance-rule/store', [AttendanceRuleController::class, 'store'])->name('attendance-rule.store');

    # Attendances-Export
    Route::get('administrator/absent/export/excel', [AdminAbsentController::class, 'export_excel'])->name('attendance.admin.export.excel');

    # Attendances-Permissions
    Route::get('administrator/permission', [PermissionController::class, 'index']);
    Route::put('administrator/permission/update/{permission}', [PermissionController::class, 'updateApproval'])->name('approval.izin');
    Route::put('administrator/permission/update/reject/{permission}', [PermissionController::class, 'updateApprovalReject'])->name('approval.reject');
    Route::delete('administrator/permission/delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');

    # Presentations
    Route::get('administrator/presentation', [PresentationController::class, 'show']);

    # Pickets
    Route::get('picket', [PicketController::class, 'index']);
    Route::delete('picket/{picket}', [PicketController::class, 'destroy'])->name('picket.delete');
    Route::post('picket/store', [PicketController::class, 'store'])->name('picket.store');
    Route::put('picket/{picket}', [PicketController::class, 'update'])->name('picket.update');
    Route::post('note-picket/store', [NotePicketController::class, 'store'])->name('note.store');
    Route::put('note-picket/{notePicket}', [NotePicketController::class, 'update'])->name('note.update');

    # Pickets-Report
    Route::get('report', [PicketingReportController::class, 'index']);

    # Institutions
    Route::resource('administrator/institution', InstitutionController::class)->except(['show', 'create', 'edit']);
});

# ================================================ Offline Student Route Group ================================================
Route::prefix('siswa-offline')->name(RolesEnum::OFFLINE->value)->group(function () {
    # Home
    Route::get('/', [StudentOflineController::class, 'index'])->name('.home');

    # Courses
    Route::get('my-course', [StudentOflineController::class, 'myCourse'])->name('.my-course');
    Route::get('course/{course}', [CourseController::class, 'detailOffline'])->name('.course.detail');
    Route::get('course/{course}/sub-course/{subCourse}', [CourseController::class, 'offlineSubCourseDetail'])->name('.sub-course.detail');
    Route::get('course/{course}/assignment/{courseAssignment}', [CourseController::class, 'offlineDetailAssignment'])->name('.assignment.detail');
    Route::get('/course', [CourseOfflineController::class, 'index'])->name('.course');
    Route::get('/course/detail/{course}', [CourseOfflineController::class, 'show'])->name('.materi.detail');
    Route::get('/course/detail/learn-more/{subCourse}', [CourseOfflineController::class, 'showSub'])->name('.submateri.detail');
    # Divisions
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('.class.division');

    # Attendances
    Route::get('absensi', [AttendanceController::class, 'attendanceOffline'])->name('.attendances');

    # Pickets
    Route::get('others/picket', [PicketOfflineController::class, 'index'])->name('.picket');

    # Challenges
    Route::get('challenge', [StudentChallengeController::class, 'index'])->name('.challenge');

    # Transaction
    Route::get('transaction/topUp', function () {
        return view('student_offline.transaction.topUp_history');
    })->name('.transactions');
    Route::get('transaction/history', function () {
        return view('student_offline.transaction.transaction_history');
    })->name('.transaction.history');
    Route::get('others/rules', function () {
        return view('student_offline.others.rules');
    })->name('.rules');

    # Purchase
    Route::get('purchase', [CourseOfflineController::class, 'shopcourse'])->name('.purchase');
    Route::get('purchase/detail/{id}', [CourseOfflineController::class, 'shopCourseDetail'])->name('.purchase.detail');

    # Others
    Route::get('/course/detail/answer-detail', function () {
        return view('student_offline.course.answer-detail');
    })->name('.answer');

    # Certificate
    Route::get('certificate', function () {
        return view('student_offline.certificate.index');
    })->name('.certificate');

    #Journal
    Route::put('journal/{journal}', [JournalController::class, 'update'])->name('.journal.update');
})->middleware(["roles:siswa-offline", 'auth']);

# Otherss
Route::post('permission', [PermissionController::class, 'store'])->name('permission.store');
Route::get('student/data/journal', [JournalController::class, 'index'])->name('journal.index');

# ================================================ Online Student Route Group =================================================
Route::prefix('siswa-online')->middleware(['roles:siswa-online', 'auth'])->name(RolesEnum::ONLINE->value)->group(function () {
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
});

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
    Route::get('/project-submissions/{project}/revision', [ProjectSubmissionController::class, 'revision'])->name('project-submissions.revision');
    Route::patch('/project-submissions/{project}/accept', [ProjectSubmissionController::class, 'accept'])->name('project-submissions.accept');
    Route::patch('/project-submissions/{project}/reject', [ProjectSubmissionController::class, 'reject'])->name('project-submissions.reject');
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

# Dashboard-Task-Presentation
Route::get('dashboard/task', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.task.index');
Route::get('dashboard/task/management', [\App\Http\Controllers\ProjectController::class, 'managementProject'])->name('project.management');
Route::get('dashboard/task/detail/{project}', [\App\Http\Controllers\ProjectController::class, 'detailProject'])->name('project.detail');
Route::get('dashboard/task/detail/{project}/presentation', [\App\Http\Controllers\ProjectController::class, 'presentationProject'])->name('project.presentation');
Route::post('dashboard/task/detail/{project}/presentation', [\App\Http\Controllers\ProjectController::class, 'storePresentation'])->name('project.presentation.save');
Route::get('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'revisionProject'])->name('project.presentation.revision');
Route::put('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'changeStatusRevision'])->name('project.presentation.revision.changestatus');
Route::post('dashboard/task/detail/{project}/presentation/revision/{presentation}', [\App\Http\Controllers\ProjectController::class, 'addRevision'])->name('project.presentation.revision.saveRevision');


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

# Mentor-Student
Route::get('student', [StudentController::class, 'mentorStudent']);

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
