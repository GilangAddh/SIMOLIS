<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\MotorListrikController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MotorListrikController::class, 'index'])->name('index-page');
Route::post('/rekomendasi', [MotorListrikController::class, 'getNormalizedScores'])->name('rekomendasi-molis');
Route::get('/motor-listrik', [MotorListrikController::class, 'getAll'])->name('daftar-molis');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/data-alternatif', [DataAlternatifController::class, 'index'])->name('data-alternatif-index');
    Route::post('/data-alternatif/store', [DataAlternatifController::class, 'store'])->name('data-alternatif-post');
    Route::put('/data-alternatif/update/{id}', [DataAlternatifController::class, 'update'])->name('data-alternatif-update');
    Route::delete('/data-alternatif/delete/{id}', [DataAlternatifController::class, "delete"])->name('data-alternatif-delete');

    Route::get('/data-kriteria', [DataKriteriaController::class, 'index'])->name('data-kriteria-index');
    Route::post('/data-kriteria/store', [DataKriteriaController::class, 'store'])->name('data-kriteria-post');
    Route::put('/data-kriteria/update/{id}', [DataKriteriaController::class, "update"])->name('data-kriteria-update');
    Route::delete('/data-kriteria/delete/{id}', [DataKriteriaController::class, "delete"])->name('data-kriteria-delete');
});

require __DIR__ . '/auth.php';
