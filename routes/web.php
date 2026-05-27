<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/kegiatan', [PageController::class, 'events'])->name('events.index');
Route::get('/kegiatan/{id}', [PageController::class, 'eventShow'])->name('events.show');
Route::get('/dokumentasi', [PageController::class, 'docs'])->name('docs.index');
Route::get('/dokumentasi/{id}', [PageController::class, 'docShow'])->name('docs.show');
Route::get('/pengajuan-acara', [PageController::class, 'proposeEvent'])->name('events.propose');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

Route::middleware('guest')->group(function (): void {
    Route::get('/masuk', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/masuk', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('/daftar', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/daftar', [RegisteredUserController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboardRedirect'])->name('dashboard');
    Route::post('/keluar', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::prefix('jemaat')
    ->name('jamaat.')
    ->middleware(['auth', 'jamaat'])
    ->group(function (): void {
        Route::get('/dashboard', [JemaatController::class, 'dashboard'])->name('dashboard');
        Route::get('/kegiatan-mendatang', [JemaatController::class, 'upcoming'])->name('upcoming');
        Route::get('/riwayat-kegiatan', [JemaatController::class, 'history'])->name('history');
        Route::get('/profil', [JemaatController::class, 'profile'])->name('profile');
        Route::put('/profil', [JemaatController::class, 'updateProfile'])->name('profile.update');
        Route::get('/ganti-password', [JemaatController::class, 'password'])->name('password');
        Route::put('/ganti-password', [JemaatController::class, 'updatePassword'])->name('password.update');
    });
