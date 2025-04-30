<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
