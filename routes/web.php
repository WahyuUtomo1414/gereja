<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/kegiatan', [PageController::class, 'events'])->name('events.index');
Route::get('/kegiatan/{id}', [PageController::class, 'eventShow'])->name('events.show');
Route::get('/dokumentasi', [PageController::class, 'docs'])->name('docs.index');
Route::get('/dokumentasi/{id}', [PageController::class, 'docShow'])->name('docs.show');
Route::get('/pengajuan-acara', [PageController::class, 'proposeEvent'])->name('events.propose');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

// Auth routes (dummy for now)
Route::get('/masuk', function () {
    return view('auth.login');
})->name('login');

Route::get('/daftar', function () {
    return view('auth.register');
})->name('register');
