<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentOfline\StudentOflineController;
use App\Http\Controllers\StudentOnline\StudentOnlineController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {return view('welcome');});

# ================================================ Authentication Routes Group ================================================
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register/post', [StudentController::class, 'store']);

# ================================================ Administrator Route Group ==================================================

//dashboard
Route::get('administrator', [AdminController::class, 'index']);

//approval routes
Route::prefix('approval')->controller(ApprovalController::class)->group(function () {
    Route::get('/', 'index');
    Route::put('/accept/{student}', 'accept');
    Route::put('/decline/{student}', 'decline');
    Route::delete('/delete/{student}', 'delete');
});

# ================================================ Offline Student Route Group ================================================
Route::get('siswa-offline', [StudentOflineController::class, 'index'])->name('siswa.offline');
Route::get('student/journal',[JournalController::class ,'index']);
# ================================================ Online Student Route Group =================================================
Route::get('siswa-online', [StudentOnlineController::class, 'index'])->name('siswa.online');
Route::get('class/division', function () {return view('student_online.division.index');});
# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================
Route::middleware('auth')->get('/home', function () {
    $roles = Auth::user()->roles->pluck('name');
    return redirect($roles[0]);
})->name('authenticated');

require_once __DIR__ . '/kader.php';
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';
