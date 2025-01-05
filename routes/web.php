<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PotonganController;
use App\Http\Controllers\TunjanganController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\SlipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-gaji', function () {
    return view('dashboard-gaji');
})->middleware(['auth', 'verified'])->name('dashboard-gaji');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// route departemen
Route::resource('/departemen', \App\Http\Controllers\DepartemenController::class);
Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
Route::post('departemen/index/departemenStore', [DepartemenController::class, 'store'])->name('departemen.store');
Route::get('departemen/index/departemenEdit/{id}', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::delete('departemen/index/departemenDelete/{id}', [DepartemenController::class, 'destroy']);
Route::put('departemen/index/departemenUpdate/{id}', [DepartemenController::class, 'update']);

// route karyawan
Route::resource('/karyawan', \App\Http\Controllers\KaryawanController::class);
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('karyawan/index/karyawanStore', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('karyawan/index/karyawanEdit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('karyawan/index/karyawanDelete/{id}', [KaryawanController::class, 'destroy']);
Route::put('karyawan/index/karyawanUpdate/{id}', [KaryawanController::class, 'update']);

// route lembur
Route::resource('/lembur', \App\Http\Controllers\KaryawanController::class);
Route::get('/lembur', [LemburController::class, 'index'])->name('lembur.index');
Route::post('lembur/index/lemburStore', [LemburController::class, 'store'])->name('lembur.store');
Route::get('lembur/index/lemburEdit/{id}', [LemburController::class, 'edit'])->name('lembur.edit');
Route::delete('lembur/index/lemburDelete/{id}', [LemburController::class, 'destroy']);
Route::put('lembur/index/lemburUpdate/{id}', [LemburController::class, 'update']);

// route potongan
Route::resource('/potongan', \App\Http\Controllers\KaryawanController::class);
Route::get('/potongan', [PotonganController::class, 'index'])->name('potongan.index');
Route::post('potongan/index/potonganStore', [PotonganController::class, 'store'])->name('potongan.store');
Route::get('potongan/index/potonganEdit/{id}', [PotonganController::class, 'edit'])->name('potongan.edit');
Route::delete('potongan/index/potonganDelete/{id}', [PotonganController::class, 'destroy']);
Route::put('potongan/index/potonganUpdate/{id}', [PotonganController::class, 'update']);

// route tunjangan
Route::resource('/tunjangan', \App\Http\Controllers\KaryawanController::class);
Route::get('/tunjangan', [TunjanganController::class, 'index'])->name('tunjangan.index');
Route::post('tunjangan/index/tunjanganStore', [TunjanganController::class, 'store'])->name('tunjangan.store');
Route::get('tunjangan/index/tunjanganEdit/{id}', [TunjanganController::class, 'edit'])->name('tunjangan.edit');
Route::delete('tunjangan/index/tunjanganDelete/{id}', [TunjanganController::class, 'destroy']);
Route::put('tunjangan/index/tunjanganUpdate/{id}', [TunjanganController::class, 'update']);

// route gaji
Route::resource('/gaji', \App\Http\Controllers\KaryawanController::class);
Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::post('gaji/index/gajiStore', [GajiController::class, 'store'])->name('gaji.store');
Route::get('gaji/index/gajiEdit/{id}', [GajiController::class, 'edit'])->name('gaji.edit');
Route::delete('gaji/index/gajiDelete/{id}', [GajiController::class, 'destroy']);
Route::put('gaji/index/gajiUpdate/{id}', [GajiController::class, 'update']);

// route slip
Route::resource('/slip', \App\Http\Controllers\KaryawanController::class);
Route::get('/slip', [SlipController::class, 'index'])->name('slip.index');
Route::post('slip/index/slipStore', [SlipController::class, 'store'])->name('slip.store');
Route::get('slip/index/slipEdit/{id}', [SlipController::class, 'edit'])->name('slip.edit');
Route::delete('slip/index/slipDelete/{id}', [SlipController::class, 'destroy']);
Route::put('slip/index/slipUpdate/{id}', [SlipController::class, 'update']);

require __DIR__.'/auth.php';
