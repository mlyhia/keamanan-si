<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Google2FAController;
use App\Http\Controllers\KomikScrapController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserManagementController;



// ========== HALAMAN AWAL ==========
Route::get('/', function () {
    return view('welcome');
});

// ========== ROUTE LOGIN & REGISTER ==========
require __DIR__.'/auth.php';


// ========== ROUTE SETUP GOOGLE AUTHENTICATOR ==========
Route::middleware(['auth'])->group(function () {
    Route::get('/2fa/setup', [Google2FAController::class, 'showSetup'])->name('2fa.setup');
    Route::post('/2fa/setup', [Google2FAController::class, 'enable'])->name('2fa.enable');
});


// ========== ROUTE VERIFIKASI 2FA SETELAH LOGIN ==========
Route::middleware(['auth'])->group(function () {
    Route::get('/2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
    Route::post('/2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');
});


// ========== ROUTE SETELAH 2FA BERHASIL ==========
Route::middleware(['auth', '2fa', 'inactivity'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD hanya user terverifikasi 2FA
    Route::resource('anime', AnimeController::class);

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Komik scraping
    Route::get('/komik-scrap', [KomikScrapController::class, 'index'])->name('komik.scrap.index');
    Route::get('/komik-scrap/{slug}', [KomikScrapController::class, 'show'])->name('komik.scrap.show');

});


// ========== ROUTE ADMIN (SETELAH 2FA) ==========
Route::middleware(['auth', '2fa', 'admin', 'inactivity'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// ========== ROUTE SUPER ADMIN: MANAJEMEN USER ==========
Route::middleware(['auth', 'verified', '2fa', 'superadmin'])->group(function () {
    // Daftar semua user
    Route::get('/admin/users', [UserManagementController::class, 'index'])
        ->name('admin.users.index');

    // Ubah role user
    Route::patch('/admin/users/{user}/role', [UserManagementController::class, 'updateRole'])
        ->name('admin.users.updateRole');

    // Hapus user
    Route::delete('/admin/users/{user}', [UserManagementController::class, 'destroy'])
        ->name('admin.users.destroy');
    
    Route::post('/2fa/disable', [Google2FAController::class, 'disable'])->name('2fa.disable');

    Route::patch('/admin/users/{user}/unlock', [UserManagementController::class, 'unlock'])
    ->name('admin.users.unlock');


});


// ========== LOGOUT (POST SAJA SESUAI LARAVEL) ==========
Route::post('/logout', function () {
    Auth::logout();
    session()->forget('2fa_verified');
    return redirect('/login');
})->name('logout');
