<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentOfline\StudentOflineController;
use App\Http\Controllers\StudentOnline\StudentOnlineController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {
    return view('welcome');
});

# ================================================ Authentication Routes Group ================================================
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register/post', [StudentController::class, 'store']);

# ================================================ Administrator Route Group ==================================================
<<<<<<< Updated upstream
Route::get('administrator' , [AdminController::class , 'index']);


=======
Route::get('administrator', [AdminController::class, 'index']);
Route::prefix('approval')->controller(ApprovalController::class)->group(function () {
    Route::get('/', 'index')->name('approval.index');
});
>>>>>>> Stashed changes
# ================================================ Offline Student Route Group ================================================
Route::get('siswa-offline', [StudentOflineController::class, 'index'])->name('siswa.offline');
# ================================================ Online Student Route Group =================================================
Route::get('siswa-online', [StudentOnlineController::class, 'index'])->name('siswa.online');
# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================
Route::middleware('auth')->get('/home', function () {
    $roles = Auth::user()->roles->pluck('name');
    return redirect($roles[0]);
})->name('authenticated');
require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';

