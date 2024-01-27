<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtsyController;
use App\Http\Controllers\EtsyPaymentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Pages\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        $userRole = auth()->user()->user_role;

        if ($userRole === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($userRole === 'Customer') {
            return redirect()->route('customer.dashboard');
        }
    }

    return redirect()->route('login');
});


// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    // Common routes for both Admin and Customer
    Route::middleware(['admin'])->group(function () {
        // Admin-only routes
        Route::get('dashboard', [PagesController::class, 'showDashboard'])->name('admin.dashboard');
        Route::get('order-list', [PagesController::class, 'orderList'])->name('admin.orderList');
        Route::get('payment-list', [PagesController::class, 'paymentList'])->name('admin.paymentList');
        
        // Route::get('payment-list', [EtsyPaymentController::class, 'showPayments'])->name('admin.paymentList');

        Route::get('order-details', [PagesController::class, 'orderDetails'])->name('admin.orderDetails');
        Route::get('customer-list', [PagesController::class, 'customerList'])->name('admin.customerList');
        Route::get('customer-details', [PagesController::class, 'customerDetails'])->name('admin.customerDetails');

        Route::get('product-list', [ShopController::class, 'productList'])->name('shops.productList');
        Route::get('/listings/{id}', [ShopController::class, 'productDetails'])->name('shops.productDetails');



        Route::get('user-list', [PagesController::class, 'userList'])->name('admin.userList');
        Route::get('roles', [PagesController::class, 'roles'])->name('admin.roles');
        Route::get('permissions', [PagesController::class, 'permissions'])->name('admin.permissions');
        Route::get('file-list', [PagesController::class, 'fileList'])->name('admin.fileList');
        Route::get('file-sets', [PagesController::class, 'fileSets'])->name('admin.fileSets');
        Route::get('collections', [PagesController::class, 'collections'])->name('admin.collections');
        
        // Shop
        
        Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
        // Route to display a specific shop
        Route::get('/shops/{id}', [ShopController::class, 'show'])->name('shops.show');

        Route::get('/shops/{id}/payments', [ShopController::class, 'paymentList'])->name('shops.paymentList');
        Route::get('/shops/{id}/receipts', [ShopController::class, 'receiptList'])->name('shops.receiptList');

        // Account Routes all
        Route::get('account/connections', [PagesController::class, 'showAccountConnection'])->name('admin.account.connections');

        // Etsy Routes
        Route::get('/etsy', [EtsyController::class, 'connect'])->name('etsy.connect');
        Route::get('/etsy/disconnect', [EtsyController::class, 'disconnect'])->name('etsy.disconnect');
        Route::get('/oauth/redirect', [EtsyController::class, 'oauthRedirect'])->name('oauth.redirect');
        Route::get('/', [EtsyController::class, 'welcome'])->name('welcome');
    });

    Route::middleware(['customer'])->group(function () {
        // Customer-only routes
        Route::get('my-dashboard', [PagesController::class, 'showCustomerDashboard'])->name('customer.dashboard');
        // Add other Customer routes here
    });
});



// test routes
