<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AskebController;
use App\Http\Controllers\DosenAskebController;

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

Route::middleware(['auth','role:mahasiswa'])->group(function () {
    Route::resource('askeb', AskebController::class);
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