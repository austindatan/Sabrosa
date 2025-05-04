<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; 

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::view('/register', 'authentication.register')->name('register');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
