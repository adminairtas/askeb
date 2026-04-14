<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AskebController;
use App\Http\Controllers\DosenAskebController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminDosenController;
use App\Http\Controllers\Admin\AdminAskebController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect awal
Route::get('/', function () {
    return redirect('/dashboard');
});


// =====================
// AUTH USER (UMUM)
// =====================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// =====================
// MAHASISWA
// =====================
Route::middleware(['auth','role:mahasiswa'])->group(function () {

    Route::resource('askeb', AskebController::class);

    Route::get('/mahasiswa/askeb/{id}/pdf', 
        [AskebController::class, 'downloadPdf']
    )->name('mahasiswa.askeb.pdf');

    Route::get('/askeb/{id}/word',
        [AskebController::class,'downloadWord']
    )->name('askeb.word');

    Route::get('/askeb/{id}/print',
        [AskebController::class, 'printPdf']
    )->name('askeb.print');

});


// =====================
// DOSEN
// =====================
Route::middleware(['auth','role:dosen'])->group(function () {

    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    });

    Route::get('/dosen/askeb/{id}', 
        [DosenAskebController::class, 'show']
    )->name('dosen.askeb.show');

    Route::post('/dosen/askeb/{id}/revisi',
        [DosenAskebController::class, 'revisi']
    )->name('dosen.askeb.revisi');

    Route::post('/dosen/askeb/{id}/acc',
        [DosenAskebController::class, 'acc']
    )->name('dosen.askeb.acc');

});


// =====================
// ADMIN
// =====================
Route::middleware(['auth','role:admin'])
->prefix('admin')
->name('admin.')
->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])
        ->name('dashboard');

    Route::resource('mahasiswa', AdminMahasiswaController::class);
    Route::resource('dosen', AdminDosenController::class);
    Route::resource('askeb', AdminAskebController::class);
    Route::resource('users', AdminUserController::class);

});


// =====================
require __DIR__.'/auth.php';