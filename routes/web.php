<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::view('/register', 'authentication.register')->name('register');
Route::view('/login', 'authentication.login')->name('login');
