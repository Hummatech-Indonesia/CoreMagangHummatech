<?php

use App\Enum\RolesEnum;
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
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VoucherSubmitController;
use App\Http\Middleware\SubscribeCheckMiddleware;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\AdminMentorController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\MentorPlacementController;
use App\Http\Controllers\Admin\WarningLetterController;
use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\StudentOnline\CourseController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\StudentOnline\ZoomScheduleController;
use App\Http\Controllers\StudentOfline\StudentOflineController;
use App\Http\Controllers\StudentOnline\StudentOnlineController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSubmissionController;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

# ================================================ Authentication Routes Group ================================================
Auth::routes();

# Register
Route::post('/register/post', [StudentController::class, 'store']);

# Statement
Route::get('statement-self', [StatementController::class, 'self'])->name('statement-self');
Route::get('statement-parent', [StatementController::class, 'parent'])->name('statement-parent');

# ================================================ Administrator Route Group ==================================================
Route::middleware(['roles:administrator', 'auth'])->group(function () {
    # Dashboard Home
    Route::get('administrator', [AdminController::class, 'index'])->name('.home');

    # Data Admin
    Route::post('data-admin/store', [DataAdminController::class, 'store'])->name('data-admin.store');
    Route::put('data-admin/update/{dataAdmin}', [DataAdminController::class, 'update'])->name('data-admin.update');

    # Approval
    Route::get('approval', [ApprovalController::class, 'index'])->name('.approval.index');
    Route::put('approval/accept/{student}', [ApprovalController::class, 'accept'])->name('approval.accept');
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

    #student
    Route::get('menu-siswa', [AdminStudentController::class, 'index'])->name('student.index');
    Route::put('menu-siswa/reset-password/{student}', [AdminStudentController::class, 'reset'])->name('student.update');
    Route::put('menu-siswa/update/{student}', [AdminStudentController::class, 'update']);
    Route::get('menu-siswa/face/{student}', [AdminStudentController::class, 'face'])->name('student.show');
    Route::delete('menu-siswa/delete/{student}', [AdminStudentController::class, 'destroy'])->name('student.delete');
    Route::put('menu-siswa/banned/{student}', [AdminStudentController::class, 'banned'])->name('student.banned');
    Route::put('menu-siswa/division-change/{student}', [AdminStudentController::class, 'divisionchange'])->name('student.divisionchange');

    #Limit
    Route::post('limit', [LimitsController::class, 'store'])->name('limit.store');
    Route::put('limit/update/{limits}', [LimitsController::class, 'update'])->name('limit.update');

    # Mentor Placement
    Route::get('online-student/menotor-placement', [MentorPlacementController::class, 'index'])->name('placement.index');
});

# ================================================ Offline Student Route Group ================================================
Route::prefix('siswa-offline')->name(RolesEnum::OFFLINE->value)->group(function () {
    Route::get('/', [StudentOflineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('.class.division');

    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
})->middleware("roles:siswa-offline", 'auth');

# ================================================ Online Student Route Group =================================================
Route::prefix('siswa-online')->middleware('roles:siswa-online', 'auth')->name(RolesEnum::ONLINE->value)->group(function () {
    Route::get('/', [StudentOnlineController::class, 'index'])->name('.home');

    Route::controller(CourseController::class)->group(function() {
        Route::get('/materi', 'index')->name('.course');
        Route::get('/materi/{course}', 'detail')->name('.course.detail');
        Route::get('/materi/{course}/course/{subCourse}', 'subCourseDetail')->name('.course.subcourse');
    });

    Route::controller(TaskSubmissionController::class)->name('.tasksubmit')->prefix('/task')->group(function() {
        Route::get('/{task}', 'create')->name('.detail');
        Route::post('/submit', 'store')->name('.submit');
    });

    // Route::get('division', function () {
    //     return view('student_online.division.index');
    // })->name('.class.division');

    # Jurnal
    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
    Route::get('jurnal/export/pdf', [JournalController::class, 'DownloadPdf'])->name('.journal.download');

    # LetterHead
    Route::get('letterhead', [LetterheadController::class, 'index'])->name('.letterhead');
    Route::post('letterhead/store', [LetterheadController::class, 'store'])->name('.letterhead.store');


    Route::get('/meeting', [ZoomScheduleController::class, 'indexStudent'])->name('zoom-meeting.indexStudent');
});

# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================

#===================================================== Mentor =================================================================
Route::prefix('mentor')->name(RolesEnum::MENTOR->value)->group(function () {
    Route::get('/', function () {
        return view('mentor.index');
    });
});

#================================================= End Mentor ====================================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    # Subscription Route
    Route::controller(SubscriptionController::class)->prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/process', 'subscribeAddCartProcess')->name('process');
        Route::post('/remove', 'subscribeDeleteCartProcess')->name('delete');
        Route::get('/checkout', 'checkout')->name('checkout');
    });

    # Voucher Subscription Apply
    Route::controller(VoucherSubmitController::class)->prefix('voucher')->name('voucher.')->group(function () {
        Route::post('apply', 'apply')->name('apply');
        Route::post('revoke', 'revoke')->name('revoke');
    });

    # Redirect based on roles
    Route::get('/home', function () {
        $roles = Auth::user()->roles->pluck('name');
        return redirect($roles[0]);
    })->name('authenticated');
});

# Transaction and Payment Routing
Route::controller(TransactionController::class)->prefix('transaction')->name('transaction-history.')->group(function() {
    Route::get('/', 'index')->middleware(['auth', 'roles:roles:siswa-offline,siswa-online'])->name('index');
    Route::get('/', 'index')->middleware(['auth', 'roles:roles:siswa-offline,siswa-online'])->name('index');
    Route::post('/tripay', 'store')->middleware(['auth', 'roles:roles:siswa-offline,siswa-online'])->name('request-to-tripay');
    Route::any('/callback', 'callback')->name('callback')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/detail/{reference:transaction_id}', 'detail')->middleware(['auth', 'roles:roles:siswa-offline,siswa-online'])->name('detail');
});

Route::get('my-order', [TransactionController::class, 'myOrder'])->name('my-order')->middleware(['auth', 'roles:roles:siswa-offline,siswa-online']);

require_once __DIR__ . '/kader.php';
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';
