<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Public Pages
Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Authentication Routes
Route::view('/register', 'authentication.register')->name('register');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role-Based Dashboards
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return match (auth()->user()->role) {
            'owner' => redirect()->route('owner.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'employee' => redirect()->route('employee.dashboard'),
            'user' => redirect()->route('user.dashboard'),
            default => abort(403, 'Unauthorized'),
        };
    })->name('dashboard');

    Route::get('/owner/dashboard', fn() => view('pages.ownerdashboard'))->name('owner.dashboard');
    Route::get('/admin/dashboard', fn() => view('pages.admindashboard'))->name('admin.dashboard');
    Route::get('/employee/dashboard', fn() => view('pages.employeedashboard'))->name('employee.dashboard');
    Route::get('/user/dashboard', fn() => view('pages.userdashboard'))->name('user.dashboard');
});