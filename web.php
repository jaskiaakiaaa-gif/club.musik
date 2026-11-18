<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('anggota', AnggotaController::class)
    ->parameters(['anggota' => 'anggota']);

    Route::resource('guru', GuruController::class);
Route::resource('mapel', MataPelajaranController::class);

Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);
