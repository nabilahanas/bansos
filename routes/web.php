<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaController;

Route::get('/penerima/create', [PenerimaController::class, 'create'])->name('penerima.create');
Route::post('/penerima/store', [PenerimaController::class, 'store'])->name('penerima.store');
Route::get('/penerima/preview/{id}', [PenerimaController::class, 'preview'])->name('penerima.preview');
