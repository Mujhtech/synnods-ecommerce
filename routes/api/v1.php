<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\NewsletterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SubCategoryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VendorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {

    // Newsletter route

    Route::post('subcribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
    Route::post('unsubcribe', [NewsletterController::class, 'unsubscribe'])->name('unsubscribe');

    // Authentication routes

    Route::prefix('auth')->name('auth.')->group(function () {

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');

        Route::post('recover', [AuthController::class, 'recover'])->name('recover');

        Route::post('reset', [AuthController::class, 'reset'])->name('reset');

        Route::post('resend', [AuthController::class, 'resend'])->name('resend');

        Route::post('verify', [AuthController::class, 'verify'])->name('verify');

        Route::get('profile', [AuthController::class, 'user'])->middleware('auth:api')->name('profile');

    });

    // Product routes

    Route::prefix('product')->name('product.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

        Route::get('/{slug}', [ProductController::class, 'single'])->name('single');

        Route::get('/category/{slug}', [ProductController::class, 'byCategory'])->name('index');

        Route::get('/sub_category/{slug}', [ProductController::class, 'bySubCategory'])->name('index');

        Route::get('/vendor/{slug}', [ProductController::class, 'byVendor'])->name('index');

        Route::post('create', [ProductController::class, 'store'])->name('create');

    });

    // Vendors route

    Route::prefix('vendor')->name('vendor.')->group(function () {

        Route::get('/', [VendorController::class, 'index'])->name('index');

        Route::get('/{slug}', [VendorController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [VendorController::class, 'destroy'])->name('delete');

        Route::post('create', [VendorController::class, 'store'])->name('create');

        Route::put('update', [VendorController::class, 'store'])->name('update');

    });

    // Category routes

    Route::prefix('category')->name('category.')->group(function () {

        Route::get('/top-level', [CategoryController::class, 'topLevel'])->name('top');

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/{slug}', [CategoryController::class, 'single'])->name('single');

    });

    // Subcategory routes

    Route::prefix('sub_category')->name('sub_category.')->group(function () {

        Route::get('/', [SubCategoryController::class, 'index'])->name('index');

        Route::get('/{slug}', [SubCategoryController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [SubCategoryController::class, 'destroy'])->name('delete');

        Route::post('create', [SubCategoryController::class, 'store'])->name('create');

        Route::put('update', [SubCategoryController::class, 'store'])->name('update');

    });

    // User routes

    Route::prefix('user')->name('user.')->middleware('auth:api')->group(function () {

        Route::put('update', [UserController::class, 'store'])->name('update');

        Route::put('billing/update', [UserController::class, 'updateBilling'])->name('billing.update');

        Route::post('shipping/create', [UserController::class, 'createShipping'])->name('shipping.create');

        Route::get('shipping/remove/{address}', [UserController::class, 'removeShippingAddress'])->name('shipping.remove');

        Route::get('shipping/default/{address}', [UserController::class, 'makeDefaultAddress'])->name('shipping.default');

    });

    Route::prefix('checkout')->name('checkout.')->middleware('auth:api')->group(function () {

        Route::get('payment-methods', [CheckoutController::class, 'paymentMethod'])->name('payment.method');

        Route::post('coupon', [CheckoutController::class, 'checkCoupon'])->name('coupon');

        Route::post('shipping', [CheckoutController::class, 'getShippingQoute'])->name('shipping');

    });

});
