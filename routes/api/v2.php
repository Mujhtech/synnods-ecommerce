<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\NewsletterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SubCategoryController;
use App\Http\Controllers\API\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('v2')->group(function () {

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

    Route::prefix('newsletter')->name('newsletter.')->middleware(["auth:api"])->group(function () {

        Route::get('/', [NewsletterController::class, 'index'])->name('index');

    });

    Route::prefix('category')->name('category.')->middleware(["auth:api"])->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/top-level', [CategoryController::class, 'topLevel'])->name('top.index');

        Route::get('/top-level/single/{slug}', [CategoryController::class, 'topLevelSingle'])->name('top.single');

        Route::post('/top-level/create', [CategoryController::class, 'storeTopLevel'])->name('top.create');

        Route::post('/top-level/update', [CategoryController::class, 'updateTopLevel'])->name('top.update');

        Route::get('/single/{slug}', [CategoryController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [CategoryController::class, 'destroy'])->name('delete');

        Route::post('create', [CategoryController::class, 'store'])->name('create');

        Route::post('update', [CategoryController::class, 'update'])->name('update');

    });

    Route::prefix('sub_category')->name('sub_category.')->middleware(["auth:api"])->group(function () {

        Route::get('/{slug}', [SubCategoryController::class, 'index'])->name('index');

        Route::get('/single/{slug}', [SubCategoryController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [SubCategoryController::class, 'destroy'])->name('delete');

        Route::post('create', [SubCategoryController::class, 'store'])->name('create');

        Route::post('update', [SubCategoryController::class, 'update'])->name('update');

    });

    Route::prefix('brand')->name('brand.')->middleware(["auth:api"])->group(function () {

        Route::get('/', [BrandController::class, 'index'])->name('index');

        Route::get('/single/{slug}', [BrandController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [BrandController::class, 'destroy'])->name('delete');

        Route::post('create', [BrandController::class, 'store'])->name('create');

        Route::post('update', [BrandController::class, 'update'])->name('update');

    });

    Route::prefix('admin')->name('admin.')->middleware(["auth:api"])->group(function () {

        Route::get('/mystore/{id}', [VendorController::class, 'mystore'])->name('mystore');

        Route::post('/store/update', [VendorController::class, 'update'])->name('store.update');

        Route::get('/users', [AdminController::class, 'users'])->name('users');

        Route::get('/customers', [AdminController::class, 'customers'])->name('customers');

        Route::get('/user/{user}', [AdminController::class, 'user'])->name('user');

        Route::post('/user/update', [AdminController::class, 'updateUser'])->name('user.update');

        Route::get('/errors', [AdminController::class, 'errors'])->name('error');

        Route::get('/activities', [AdminController::class, 'activities'])->name('activity');

        Route::get('/roles', [AdminController::class, 'roles'])->name('role');

        Route::get('/contacts', [AdminController::class, 'contacts'])->name('contact');

        Route::get('/contact/{contact}', [AdminController::class, 'getContact'])->name('contact.single');

        Route::get('/shippings', [AdminController::class, 'getShippings'])->name('shipping');

        Route::get('/shipping/{id}', [AdminController::class, 'getShipping'])->name('shipping.single');

        Route::post('/shipping/create', [AdminController::class, 'createShipping'])->name('shipping.create');

        Route::post('/shipping/update', [AdminController::class, 'updateShipping'])->name('shipping.update');

        Route::get('/discounts', [AdminController::class, 'getCoupons'])->name('discount');

        Route::get('/discount/{id}', [AdminController::class, 'getCoupons'])->name('discount.single');

        Route::post('/discount/create', [AdminController::class, 'createDiscount'])->name('discount.create');

        Route::post('/discount/update', [AdminController::class, 'updateDiscount'])->name('discount.update');

    });

    Route::prefix('media')->name('media.')->middleware(["auth:api"])->group(function () {

        Route::get('/directories', [MediaController::class, 'index'])->name('index');

        Route::get('/files/{folder}', [MediaController::class, 'single'])->name('single');

        Route::post('/upload', [MediaController::class, 'upload'])->name('upload');

        Route::post('/create-directory', [MediaController::class, 'createDirectory'])->name('md');

        Route::post('/delete-directory', [MediaController::class, 'destroyDirectory'])->name('dd');

        Route::post('/delete-file', [MediaController::class, 'destroyFile'])->name('df');

    });

    Route::prefix('product')->name('product.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('/load', [ProductController::class, 'load'])->name('load');

        Route::get('/review', [ProductController::class, 'review'])->name('review');

        Route::get('/{slug}', [ProductController::class, 'single'])->name('single');

        Route::post('create', [ProductController::class, 'store'])->name('create');

        Route::post('update', [ProductController::class, 'update'])->name('update');

    });

});
