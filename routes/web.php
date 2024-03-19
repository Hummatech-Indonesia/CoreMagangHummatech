<?php

use App\Enum\RolesEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\WarningLetterController;
use App\Http\Controllers\Admin\ResponseLetterController;
use App\Http\Controllers\StudentOfline\StudentOflineController;
use App\Http\Controllers\StudentOnline\StudentOnlineController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VoucherController;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

# ================================================ Authentication Routes Group ================================================
Auth::routes();

Route::post('/register/post', [StudentController::class, 'store']);

# ================================================ Administrator Route Group ==================================================
Route::name(RolesEnum::ADMIN->value)->group(function () {

    // Dashboard Home
    Route::get('/administrator', [AdminController::class, 'index'])->name('.home');

    // Approval
    Route::get('/approval', [ApprovalController::class, 'index'])->name('.approval.index');
    Route::put('/approval/accept/{student}', [ApprovalController::class, 'accept'])->name('.approval.accept');
    Route::put('/approval/decline/{student}', [ApprovalController::class, 'decline'])->name('.approval.decline');
    Route::delete('/approval/delete{student}', [ApprovalController::class, 'destroy'])->name('.approval.delete');

    // Warning letter
    Route::get('/warning-letter', [WarningLetterController::class, 'index'])->name('.warning-letter.index');
    Route::post('/warning-letter/store', [WarningLetterController::class, 'store'])->name('.warning-letter.store');

    // Response letter
    Route::get('/response-letter', [ResponseLetterController::class, 'index'])->name('.response-letter.index');

    // Voucher
    Route::get('/voucher', [VoucherController::class, 'index'])->name('.voucher.index');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('.voucher.store');
    Route::delete('/voucher/delete/{voucher}', [VoucherController::class, 'destroy'])->name('.voucher.delete');
})->middleware(['roles:administrator', 'auth']);

# ================================================ Offline Student Route Group ================================================
Route::prefix('siswa-offline')->name(RolesEnum::OFFLINE->value)->group(function() {
    Route::get('/', [StudentOflineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('.class.division');

    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
})->middleware("roles:siswa-offline");

# ================================================ Online Student Route Group =================================================
Route::prefix('siswa-online')->middleware('roles:siswa-online', 'auth')->name(RolesEnum::ONLINE->value)->group(function() {
    Route::get('/', [StudentOnlineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_online.division.index');
    })->name('.class.division');

    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
});

# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    # Subscription Route
    Route::controller(SubscriptionController::class)->prefix('subscription')->name('subscription.')->group(function() {
        Route::get('/', 'index')->name('index');
    })->middleware('roles:siswa-offline,siswa-online');

    # Redirect based on roles
    Route::get('/home', function () {
        $roles = Auth::user()->roles->pluck('name');
        return redirect($roles[0]);
    })->name('authenticated');
});

require_once __DIR__ . '/kader.php';
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';
