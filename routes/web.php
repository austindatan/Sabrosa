<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CustomerController; 
use App\Http\Controllers\AdminController;

// ✅ Public Pages
Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');


// ✅ Authentication Routes
Route::middleware('guest')->group(function () {
    Route::view('/register', 'authentication.register')->name('register');
    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ✅ Forgot Password Routes
Route::get('/forgot', fn() => view('authentication.forgot'))->name('forgot');
Route::post('/forgot', [AuthController::class, 'resetPassword'])->name('forgot.submit');

// ✅ Cart Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}/{action}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
});

// ✅ Checkout Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

// ✅ Delivery Routes (Requires Auth) - ✅ Uses CustomerController
Route::middleware('auth')->group(function () {
    Route::get('/delivery', [CustomerController::class, 'show'])->name('delivery');
    Route::post('/delivery/update', [CustomerController::class, 'update'])->name('delivery.update');
});

// ✅ Payment Method Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('payment.methods');
    Route::get('/payment-methods/{id}', [PaymentMethodController::class, 'show'])->name('payment.methods.show');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment.methods.store');
});

// ✅ Shipping Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::get('/shipping-methods', [ShippingController::class, 'index'])->name('shipping.methods');
    Route::get('/shipping-methods/{id}', [ShippingController::class, 'show'])->name('shipping.methods.show');
    Route::post('/shipping-methods/{id}/update', [ShippingController::class, 'update'])->name('shipping.methods.update');
});

// ✅ Alternative Cart Route for Non-Logged-In Users
Route::get('/cart-not-logged-in', fn() => view('pages.cart_not_logged_in'))->name('cart.not_logged_in');

// ✅ Dashboard Routes (Requires Auth)
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

// ✅ User Management Routes (Requires Admin)
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::put('/update-role/{user}', [ManageUserController::class, 'updateRole'])->name('update.role');
    Route::delete('/delete-user/{user}', [ManageUserController::class, 'deleteUser'])->name('delete.user');
});

// ✅ Admin Dashboard Routes
Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('/admin/productlist', [AdminController::class, 'admin_productlist'])->name('admin.productlist');
Route::get('/admin/addproduct', [AdminController::class, 'admin_addproduct'])->name('admin.addproduct');
Route::get('/admin/employees', [AdminController::class, 'admin_employees'])->name('admin.employees');
Route::get('/admin/addemployees', [AdminController::class, 'admin_addemployees'])->name('admin.addemployees');
Route::get('/admin/handleusers', [AdminController::class, 'admin_handleusers'])->name('admin.handleusers');
Route::get('/admin/handleorders', [AdminController::class, 'admin_handleorders'])->name('admin.handleorders');



