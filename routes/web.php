<?php

use App\Controllers\Mahasiswa;
use App\Controllers\Matkul;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
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

Route::get('/', function () {
    return view('welcome');
});

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class,'index'])->name('mahasiswa.index');
Route::post('/mahasiswa', [MahasiswaController::class,'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class,'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class,'delete'])->name('mahasiswa.delete');

// matkul
Route::get('/matkul', [MatkulController::class,'index'])->name('matkul.index');
Route::post('/matkul', [MatkulController::class,'store'])->name('matkul.store');
Route::put('/matkul/{nidn}', [MatkulController::class,'update'])->name('matkul.update');
Route::delete('//{nidn}', [MatkulController::class,'delete'])->name('matkul.delete');
