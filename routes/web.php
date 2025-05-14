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

Route::get('/', [ProductController::class, 'showHome'])->name('home');
Route::get('/shop', [ProductController::class, 'showShop'])->name('shop');
Route::get('/about', [ProductController::class, 'showAbout'])->name('about');
Route::get('/contact', [ProductController::class, 'showContact'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions'])->name('search.suggestions');

Route::view('/tos', 'tos');
Route::view('/privacy', 'privacy');

Route::middleware('guest')->group(function () {
    Route::view('/register', 'authentication.register')->name('register');
    Route::view('/login', 'authentication.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/forgot', fn() => view('authentication.forgot'))->name('forgot');
    Route::post('/forgot', [AuthController::class, 'resetPassword'])->name('forgot.submit');
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}/{action}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/delivery', [CheckoutController::class, 'showDeliveryPage'])->name('delivery');
    Route::get('/delivery/{id}', [CustomerController::class, 'edit'])->name('delivery.edit');
    Route::post('/delivery/{id}', [CustomerController::class, 'update'])->name('delivery.update');
    Route::post('/delivery', [DeliveryController::class, 'update'])->name('delivery.payment.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'storePaymentMethod']);
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/complete-purchase', [CheckoutController::class, 'completePurchase'])->name('complete.purchase');
    Route::get('/transaction/{transaction_id}', [CheckoutController::class, 'processTransaction'])->name('transaction');

    Route::get('/payment-methods', [PaymentMethodController::class, 'index'])->name('payment.methods');
    Route::get('/payment-methods/{id}', [PaymentMethodController::class, 'show'])->name('payment.methods.show');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment.methods.store');
    Route::post('/customer/update-payment-method', [CustomerController::class, 'updatePaymentMethod'])->name('customer.updatePaymentMethod');

    Route::get('/shipping-methods', [ShippingController::class, 'index'])->name('shipping.methods');
    Route::get('/shipping-methods/{id}', [ShippingController::class, 'show'])->name('shipping.methods.show');
    Route::post('/shipping-methods/{id}/update', [ShippingController::class, 'update'])->name('shipping.methods.update');

    Route::get('/dashboard', function () {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'user' => redirect()->route('user.dashboard'),
            default => abort(403, 'Unauthorized'),
        };
    })->name('dashboard');

    Route::middleware(['auth', 'checkrole:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
        Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/update-popup/{id}', [UserController::class, 'updateProfilePopup'])->name('user.updatePopup');
        Route::post('/user/update-password', [UserController::class, 'change'])->name('user.change');
        Route::get('/user/transaction/{id}', [UserController::class, 'transactionHistory'])->name('user.transactionHistory');
        Route::post('/user/transaction/complete/{id}', [UserController::class, 'completeOrder'])->name('user.completeOrder');
    });

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
        Route::get('/admin/product/{product}', [AdminController::class, 'admin_productdetail'])->name('admin.productdetail');
        Route::put('/admin/product/{product}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
        Route::delete('/admin/product/{product}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    });
});

Route::get('/cart-not-logged-in', fn() => view('pages.cart_not_logged_in'))->name('cart.not_logged_in');
