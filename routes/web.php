<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AskebController;
use App\Http\Controllers\DosenAskebController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminDosenController;
use App\Http\Controllers\Admin\AdminAskebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    });
});

Route::middleware(['auth','role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dosen/askeb/{id}', 
        [DosenAskebController::class, 'show']
    )->name('dosen.askeb.show');

});

Route::post('/dosen/askeb/{id}/revisi',
    [DosenAskebController::class, 'revisi']
)->name('dosen.askeb.revisi');


Route::post('/dosen/askeb/{id}/acc',
    [DosenAskebController::class, 'acc']
)->name('dosen.askeb.acc');
require __DIR__.'/auth.php';

Route::resource('askeb', AskebController::class)
    ->middleware(['auth','role:mahasiswa']);

    Route::get('/mahasiswa/askeb/{id}/pdf', 
    [AskebController::class, 'downloadPdf']
)->name('mahasiswa.askeb.pdf');

Route::get('/askeb/{id}/word',[AskebController::class,'downloadWord'])
->name('askeb.word');

Route::get('/askeb/{id}/print', [AskebController::class, 'printPdf'])->name('askeb.print');

Route::middleware(['auth','role:admin'])
->prefix('admin')
->name('admin.')
->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])
        ->name('dashboard');

});

Route::middleware(['auth','role:admin'])
->prefix('admin')
->name('admin.')
->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])
        ->name('dashboard');

    // MAHASISWA
    Route::resource('mahasiswa', AdminMahasiswaController::class);

    // DOSEN
    Route::resource('dosen', AdminDosenController::class);

    // ASKEB
    Route::resource('askeb', AdminAskebController::class);

});

use App\Http\Controllers\Admin\AdminUserController;

Route::middleware(['auth','role:admin'])
->prefix('admin')
->name('admin.')
->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])
        ->name('dashboard');

    Route::resource('users', AdminUserController::class);

});