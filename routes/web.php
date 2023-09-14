<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;

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
    return view('home');
})->name('home');

//rute coba
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

//rute mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{npm}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{npm}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
