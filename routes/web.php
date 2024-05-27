<?php

use App\Enum\RolesEnum;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimitsController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\LetterheadController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminJournalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VoucherSubmitController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\AdminMentorController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\MentorPlacementController;
use App\Http\Controllers\Admin\WarningLetterController;
use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\AppointmentOfAmentorController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseStoreController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Mentor\DashboardController;
use App\Http\Controllers\StudentOnline\CourseController;
use App\Http\Controllers\CourseController as AdminCourseController;
use App\Http\Controllers\DataCOController;
use App\Http\Controllers\FaceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignatureCOController;
use App\Http\Controllers\StudentCourseController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\StudentOnline\ZoomScheduleController;
use App\Http\Controllers\StudentOfline\StudentOflineController;
use App\Http\Controllers\StudentOnline\StudentOnlineController;
use App\Http\Controllers\SubCourseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSubmissionController;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', [LandingController::class, 'index']);
Route::get('/hummatech/{id}', [SignatureCOController::class, 'index']);
// Route::get('/payment-instructions/{code}', [PaymentController::class, 'paymentInstructions']);

# ================================================ Authentication Routes Group ================================================
Auth::routes();

# Register
Route::post('/register/post', [StudentController::class, 'store']);

# Statement
Route::get('statement-self', [StatementController::class, 'self'])->name('statement-self');
Route::get('statement-parent', [StatementController::class, 'parent'])->name('statement-parent');

# ================================================ Administrator Route Group ==================================================
Route::middleware(['roles:administrator', 'auth'])->group(function () {
    Route::get('absent', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('product', [ProductController::class, 'index']);
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    # Dashboard Home
    Route::get('administrator', [AdminController::class, 'index'])->name('.home');
    Route::patch('max-late', [AttendanceController::class, 'storeMaxLate'])->name('maxlate.store');
    # Data Admin
    Route::post('data-admin/store', [DataAdminController::class, 'store'])->name('data-admin.store');
    Route::put('data-admin/update/{dataAdmin}', [DataAdminController::class, 'update'])->name('data-admin.update');

    // data ceo
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
    // banned
    Route::get('students-banned', [StudentController::class , 'index']);

    # Mentor
    Route::get('menu-mentor', [AdminMentorController::class, 'index'])->name('mentor.index');
    Route::post('menu-mentor/store', [AdminMentorController::class, 'store'])->name('mentor.store');
    Route::put('menu-mentor/update/{mentor}', [AdminMentorController::class, 'update'])->name('mentor.update');
    Route::delete('menu-mentor/delete/{mentor}', [AdminMentorController::class, 'destroy'])->name('mentor.delete');
    Route::get('menu-mentor/detail/{mentor}', [AdminMentorController::class, 'show'])->name('mentor.show');
    # Student
    Route::get('menu-siswa', [AdminStudentController::class, 'index'])->name('student.index');
    Route::put('menu-siswa/reset-password/{student}', [AdminStudentController::class, 'reset'])->name('student.update');
    Route::put('menu-siswa/update/{student}', [AdminStudentController::class, 'update']);
    Route::get('menu-siswa/face/{student}', [AdminStudentController::class, 'face'])->name('student.show');
    Route::delete('menu-siswa/delete/{student}', [AdminStudentController::class, 'destroy'])->name('student.delete');
    Route::put('menu-siswa/banned/{student}', [AdminStudentController::class, 'banned'])->name('student.banned');
    Route::put('menu-siswa/division-change/{student}', [AdminStudentController::class, 'divisionchange'])->name('student.divisionchange');
    Route::put('students-banned/Open/{student}', [StudentController::class, 'Openbanned'])->name('students.banned.open');
    # Registration Limit
    Route::post('limit', [LimitsController::class, 'store'])->name('limit.store');
    Route::put('limit/update/{limits}', [LimitsController::class, 'update'])->name('limit.update');
    # Mentor Placement
    Route::get('online-student/menotor-placement', [MentorPlacementController::class, 'index'])->name('placement.index');
    Route::post('online-student/menotor-placement/post/{student}', [MentorPlacementController::class, 'store'])->name('placement.update');
    Route::put('online-student/menotor-placement/edit/{student}', [MentorPlacementController::class, 'update'])->name('placement.delete');
    # Courses
    Route::get('administrator/course', [AdminCourseController::class, 'index']);
    Route::post('administrator/course/store', [AdminCourseController::class, 'store'])->name('course.store');
    Route::put('administrator/course/{course}', [AdminCourseController::class, 'update'])->name('course.update');
    Route::delete('administrator/course/delete/{course}', [AdminCourseController::class, 'destroy'])->name('course.destroy');
    // AppointmenOfAmentor
    Route::get('administrator/appointmentofmentor', [AppointmentOfAmentorController::class, 'index']);
    Route::post('administrator/appointmentofmentor/store', [AppointmentOfAmentorController::class, 'store']);
    Route::delete('administrator/appointmentofmentor/delete/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'destroy']);
    Route::delete('administrator/appointmentofmentor/delete/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'destroy']);
    Route::put('administrator/appointmentofmentor/update/{appointmentOfAmentor}', [AppointmentOfAmentorController::class, 'update']);
    // faces
    Route::get('faces', [FaceController::class, 'index']);
    Route::get('faces/detail/{id}', [FaceController::class, 'show']);
    Route::post('faces/create', [FaceController::class, 'store']);
    Route::delete('faces/delete/{student}', [FaceController::class, 'destroy']);
    # Course Details
    Route::get('/administrator/course/detail/{course}', [AdminCourseController::class, 'show'])->name('course.detail');
    Route::delete('administrator/subcourse/delete/{subCourse}', [SubCourseController::class, 'destroy'])->name('subCourse.destroy');
    Route::get('/administrator/subcourse/detail/{subCourse}', [SubCourseController::class, 'show'])->name('subCourse.detail');
    Route::put('/administrator/subcourse/edit/{subCourse}', [SubCourseController::class, 'update'])->name('subCourse.update');
    Route::post('administrator/task/store', [TaskController::class, 'store'])->name('task.store');
    # Zoom Schedule
    Route::get('administrator/zoom-schedules', [ZoomScheduleController::class, 'index']);
    Route::post('administrator/zoom-schedules/store', [ZoomScheduleController::class, 'store'])->name('zoom-schedule.store');
    Route::put('administrator/zoom-schedules/{zoomSchedule}', [ZoomScheduleController::class, 'update'])->name('zoom-schedule.update');
    Route::delete('administrator/zoom-schedules/{zoomSchedule}', [ZoomScheduleController::class, 'destroy'])->name('zoom-schedule.destroy');
    // journal
    Route::get('journal', [AdminJournalController::class, 'index']);
});

# ================================================ Offline Student Route Group ================================================
Route::prefix('siswa-offline')->name(RolesEnum::OFFLINE->value)->group(function () {
    Route::get('/', [StudentOflineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('.class.division');
})->middleware(["roles:siswa-offline", 'auth']);

Route::post('permission', [PermissionController::class, 'store'])->name('permission.store');

Route::get('student/data/journal', [JournalController::class, 'index'])->name('journal.index');
# ================================================ Online Student Route Group =================================================
Route::prefix('siswa-online')->middleware(['roles:siswa-online', 'auth'])->name(RolesEnum::ONLINE->value)->group(function () {
    Route::get('/', [StudentOnlineController::class, 'index'])->name('.home');
    Route::controller(CourseController::class)->middleware('subsrcribed')->group(function () {
        Route::get('/materi', 'index')->name('.course');
        Route::get('/materi/{course}', 'detail')->name('.course.detail');
        Route::get('/materi/{course}/course/{subCourse}', 'subCourseDetail')->name('.course.subcourse');
    });
    Route::controller(TaskSubmissionController::class)->name('.tasksubmit')->prefix('/tugas')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{task}', 'create')->name('.detail');
        Route::get('/{task}/download/{taskSubmission}', 'download')->name('.download');
        Route::post('/submit', 'store')->name('.submit');
    });
    # Jurnal
    # LetterHead
    Route::get('letterhead', [LetterheadController::class, 'index'])->name('.letterhead');
    Route::post('letterhead/store', [LetterheadController::class, 'store'])->name('.letterhead.store');

    Route::get('/meeting', [ZoomScheduleController::class, 'indexStudent'])->name('zoom-meeting.indexStudent');
});

Route::get('jurnal/export/pdf', [JournalController::class, 'DownloadPdf'])->name('.journal.download');
# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================

#===================================================== Mentor =================================================================
Route::prefix('mentor')->name(RolesEnum::MENTOR->value)->group(function () {
    // Route::get('/', function () {
    //     return view('mentor.index');
    // });
});
Route::get('/home', [DashboardController::class, 'index'])->name('home');

#================================================= End Mentor ====================================================================
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    # Subscription Route
    Route::controller(SubscriptionController::class)->prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/process', 'subscribeAddCartProcess')->name('process');
        // Route::post('/remove', 'subscribeDeleteCartProcess')->name('delete');
        // Route::get('/checkout', 'checkout')->name('checkout');
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
    // Route::controller(CourseStoreController::class)
    //     ->middleware(['subsrcribed:online'])
    //     ->name('course-store.')
    //     ->prefix('courses')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('{course}/detail', 'detail')->name('detail');
    //         Route::post('store', 'store')->name('store');
    //     });

    # Redirect based on roles
    Route::get('/login', function () {
        $roles = Auth::user()->roles->pluck('name');
        return redirect($roles[0]);
    })->name('authenticated');
});

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
// Route::controller(TransactionController::class)->prefix('transaction')->name('transaction-history.')->group(function () {
//     Route::get('/', 'index')->middleware(['auth'])->name('index');
//     Route::get('checkout', 'checkout')->middleware(['auth'])->name('checkout');
//     Route::post('tripay', 'store')->middleware(['auth'])->name('request-to-tripay');
//     Route::any('callback', 'callback')->name('callback')->withoutMiddleware(VerifyCsrfToken::class);
//     Route::get('detail/{reference:transaction_id}', 'detail')->middleware(['auth'])->name('detail');
// });

Route::get('order', [OrderController::class, 'index'])->name('my-order')->middleware(['auth']);

require_once __DIR__ . '/kader.php';
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';
