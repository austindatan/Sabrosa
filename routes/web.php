<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController; // ✅ Ensure checkout controller is imported

// Public Pages
Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Cart Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
});

// Alternative Route for Non-Logged-In Users
Route::get('/cart-not-logged-in', function () {
    return view('pages.cart_not_logged_in');
})->name('cart.not_logged_in');

// ✅ Checkout Route
Route::middleware('auth')->get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Authentication Routes
Route::view('/register', 'authentication.register')->name('register');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes (Requires Auth)
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

    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])->name('owner.dashboard');
    Route::get('/admin/dashboard', fn() => view('pages.admindashboard'))->name('admin.dashboard');
    Route::get('/employee/dashboard', fn() => view('pages.employeedashboard'))->name('employee.dashboard');
    Route::get('/user/dashboard', fn() => view('pages.userdashboard'))->name('user.dashboard');
});

// User Management Routes
Route::put('/update-role/{user}', [ManageUserController::class, 'updateRole'])->name('update.role');
Route::delete('/delete-user/{user}', [ManageUserController::class, 'deleteUser'])->name('delete.user');