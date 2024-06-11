<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataController;

Route::get('/login', [LoginController::class, 'showlogin']);
Route::get('/siriba/data-industri', [DataController::class, 'index'])->name('data-industri');
Route::get('/siriba/data-industri/tambah-data', [DataController::class, 'inputindustri'])->name('data-industri.input');
Route::post('/siriba/data-industri', [DataController::class, 'storeindustri'])->name('data-industri.store');
Route::delete('/siriba/data-industri/{id}', [DataController::class, 'destroyindustri'])->name('data-industri.destroy');