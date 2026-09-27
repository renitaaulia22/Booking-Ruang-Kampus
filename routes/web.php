<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PeminjamanRuangController;

// Halaman utama langsung diarahkan ke daftar peminjaman ruang
Route::get('/', function () {
    return redirect()->route('peminjaman-ruangs.index');
});

// Resource routes untuk BREAD 4 tabel
Route::resource('dosens', DosenController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('matakuliahs', MatakuliahController::class);
Route::resource('peminjaman-ruangs', PeminjamanRuangController::class);