<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\KapasitasController;
use App\Http\Controllers\KbliController;
use App\Http\Controllers\TenagaKerjaController;
use App\Models\TenagaKerja;

// Login
Route::get('/login', [LoginController::class, 'showlogin']);

// Data Industri
Route::get('/siriba/data-industri', [DataController::class, 'index'])->name('data-industri');
Route::get('/siriba/data-industri/input-industri', [DataController::class, 'inputindustri'])->name('data-industri.input');
Route::post('/siriba/data-industri', [DataController::class, 'storeindustri'])->name('data-industri.store');
Route::delete('/siriba/data-industri/{id}', [DataController::class, 'destroyindustri'])->name('data-industri.delete');
Route::get('/siriba/data-industri/edit-industri/{id}', [DataController::class, 'editindustri'])->name('data-industri.edit');
Route::put('/siriba/data-industri/{id}', [DataController::class, 'updateindustri'])->name('data-industri.update');

// KBLI
Route::get('/siriba/data-kbli', [KbliController::class, 'showkbli'])->name('data-kbli');
Route::get('/siriba/data-kbli/input-kbli', [KbliController::class, 'inputkbli'])->name('data-kbli.input');
Route::post('/siriba/data-kbli', [KbliController::class, 'storekbli'])->name('data-kbli.store');
Route::get('/siriba/data-kbli/edit-kbli/{id}', [KbliController::class, 'editkbli'])->name('data-kbli.edit');
Route::put('/siriba/data-kbli/update-kbli/{id}', [KbliController::class, 'updatekbli'])->name('data-kbli.update');
Route::delete('/siriba/data-kbli/delete-kbli/{id}', [KbliController::class, 'deletekbli'])->name('data-kbli.delete');

// Tenaga Kerja
Route::get('/siriba/data-tenaga-kerja', [TenagaKerjaController::class, 'index'])->name('data-tenaker');
Route::get('/siriba/data-investasi', [InvestasiController::class, 'index'])->name('data-investasi');
Route::get('/siriba/data-kapasitas-produksi', [KapasitasController::class, 'index'])->name('data-kapasitas-produksi');