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

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {
    return view('welcome');
});

# ================================================ Authentication Routes Group ================================================
Auth::routes();

Route::post('/register/post', [StudentController::class, 'store']);

# ================================================ Administrator Route Group ==================================================
Route::prefix('administrator')->name(RolesEnum::ADMIN->value)->group(function () {
    // Dashboard Home
    Route::get('/', [AdminController::class, 'index'])->name('.home');

    // Approval
    Route::prefix('approval')->controller(ApprovalController::class)->group(function () {
        Route::get('/', 'index')->name('.approval.index');
        Route::put('/accept/{student}', 'accept')->name('.approval.accept');
        Route::put('/decline/{student}', 'decline')->name('.approval.decline');
        Route::delete('/delete/{student}', 'delete')->name('.approval.delete');
    });

    // Warning letter
    Route::prefix('warning-letter')->controller(WarningLetterController::class)->group(function () {
        Route::get('/', 'index')->name('.warning-letter.index');
        Route::post('/store', 'store')->name('.warning-letter.store');
    });

    // Response letter
    Route::prefix('registration')->controller(ResponseLetterController::class)->group(function () {
        Route::get('/', 'index')->name('.registration');
    });
})->middleware(['roles:administrator', 'auth']);

# ================================================ Offline Student Route Group ================================================
Route::prefix('siswa-offline')->name(RolesEnum::OFFLINE->value)->group(function() {
    Route::get('/', [StudentOflineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_offline.division.index');
    })->name('.class.division');

    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
});

# ================================================ Online Student Route Group =================================================
Route::prefix('siswa-online')->name(RolesEnum::ONLINE->value)->group(function() {
    Route::get('siswa-online', [StudentOnlineController::class, 'index'])->name('.home');
    Route::get('division', function () {
        return view('student_online.division.index');
    })->name('.class.division');

    Route::get('journal', [JournalController::class, 'index'])->name('.journal.index');
});

# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->get('/home', function () {
    $roles = Auth::user()->roles->pluck('name');
    return redirect($roles[0]);
})->name('authenticated');

require_once __DIR__ . '/kader.php';
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';
