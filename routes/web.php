<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/tropical', [ProductController::class, 'showTropical'])->name('tropical.show');
Route::get('/don', [ProductController::class, 'showDon'])->name('don.show');
Route::get('/barbie', [ProductController::class, 'showBarbie'])->name('barbie.show');
Route::get('/bun', [ProductController::class, 'showBun'])->name('bun.show');
Route::get('/tea', [ProductController::class, 'showTea'])->name('tea.show');
Route::get('/smores', [ProductController::class, 'showSmores'])->name('smores.show');
