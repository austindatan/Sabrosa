<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; // Add this line to import AuthController

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::view('/register', 'authentication.register')->name('register');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Handle POST login
