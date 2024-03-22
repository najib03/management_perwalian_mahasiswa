<?php

use App\Http\Controllers\AjaranController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('angkatan', AngkatanController::class);
    Route::resource('ajaran', AjaranController::class);
    Route::resource('semester', \App\Http\Controllers\SemesterController::class);


    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});
