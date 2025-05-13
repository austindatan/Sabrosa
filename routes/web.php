<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController,
    AuthController,
    CartController,
    CheckoutController,
    PaymentMethodController,
    ShippingController,
    CustomerController,
    ProductDetailController,
    SearchController,
    TransactionController,
    DeliveryController,
    OwnerDashboardController,
    AdminController,
    UserController,
    ManageUserController
};

// Public Routes
Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions'])->name('search.suggestions');

Route::view('/tos', 'tos');
Route::view('/privacy', 'privacy');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::view('/register', 'authentication.register')->name('register');
    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/forgot', fn() => view('authentication.forgot'))->name('forgot');
    Route::post('/forgot', [AuthController::class, 'resetPassword'])->name('forgot.submit');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Cart
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}/{action}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    // Delivery
    Route::get('/delivery', [CheckoutController::class, 'showDeliveryPage'])->name('delivery');
    Route::get('/delivery/{id}', [CustomerController::class, 'edit'])->name('delivery.edit');
    Route::post('/delivery/{id}', [CustomerController::class, 'update'])->name('delivery.update');
    Route::post('/delivery', [DeliveryController::class, 'update'])->name('delivery.payment.update');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'storePaymentMethod']);
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/complete-purchase', [CheckoutController::class, 'completePurchase'])->name('complete.purchase');
    Route::get('/transaction/{transaction_id}', [CheckoutController::class, 'processTransaction'])->name('transaction');

    // Payment Methods
    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('payment.methods');
    Route::get('/payment-methods/{id}', [PaymentMethodController::class, 'show'])->name('payment.methods.show');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment.methods.store');
    Route::post('/customer/update-payment-method', [CustomerController::class, 'updatePaymentMethod'])->name('customer.updatePaymentMethod');

    // Shipping
    Route::get('/shipping-methods', [ShippingController::class, 'index'])->name('shipping.methods');
    Route::get('/shipping-methods/{id}', [ShippingController::class, 'show'])->name('shipping.methods.show');
    Route::post('/shipping-methods/{id}/update', [ShippingController::class, 'update'])->name('shipping.methods.update');

    // Dashboard Redirect by Role
    Route::get('/dashboard', function () {
        return match (auth()->user()->role) {
            'owner' => redirect()->route('owner.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'employee' => redirect()->route('employee.dashboard'),
            'user' => redirect()->route('user.dashboard'),
            default => abort(403, 'Unauthorized'),
        };
    })->name('dashboard');

    // User Routes
    Route::middleware(['auth', 'checkrole:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
        Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/update-popup/{id}', [UserController::class, 'updateProfilePopup'])->name('user.updatePopup');
    });

    // Employee Routes
    Route::middleware(['auth', 'checkrole:employee'])->group(function () {
        Route::get('/employee/dashboard', fn() => view('pages.employeedashboard'))->name('employee.dashboard');
    });

    // Admin Routes
    Route::middleware('checkrole:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('/admin/productlist', [AdminController::class, 'admin_productlist'])->name('admin.productlist');
        Route::get('/admin/addproduct', [AdminController::class, 'admin_addproduct'])->name('admin.addproduct');
        Route::post('/admin/addproduct', [AdminController::class, 'storeProduct'])->name('admin.storeProduct');
        Route::get('/admin/employees', [AdminController::class, 'admin_employees'])->name('admin.employees');
        Route::get('/admin/addemployees', [AdminController::class, 'admin_addemployees'])->name('admin.addemployees');
        Route::post('/admin/addemployees', [AdminController::class, 'storeEmployees'])->name('admin.storeEmployees');
        Route::get('/admin/handleusers', [AdminController::class, 'admin_handleusers'])->name('admin.handleusers');
        Route::get('/admin/handleorders', [AdminController::class, 'admin_handleorders'])->name('admin.handleorders');
    });

    // Owner Routes
    Route::middleware('checkrole:owner')->group(function () {
        Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])->name('owner.dashboard');
    });

    // Management Permissions
    Route::middleware('can:manage-users')->group(function () {
        Route::put('/update-role/{user}', [ManageUserController::class, 'updateRole'])->name('update.role');
        Route::delete('/delete-user/{user}', [ManageUserController::class, 'deleteUser'])->name('delete.user');
    });
});

// Fallback for guests accessing cart
Route::get('/cart-not-logged-in', fn() => view('pages.cart_not_logged_in'))->name('cart.not_logged_in');
