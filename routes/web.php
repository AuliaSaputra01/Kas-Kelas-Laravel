<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('anggota', AnggotaController::class)->except('show')->parameters(['anggota' => 'anggota']);
Route::resource('transaksi', TransaksiController::class)->except('show');
