<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubCategoryController;
use App\Http\Controllers\API\VendorController;
use App\Http\Controllers\API\NewsletterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/sendchamp', function() {
    print_r(sendchamp()->getWalletReport());
});

Route::get('/', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'Api is up and running'
    ], 200, $request->header());
});

Route::group(['prefix' => 'v1'], function () {

    // Newsletter route

    Route::post('subcribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
    Route::post('unsubcribe', [NewsletterController::class, 'unsubscribe'])->name('unsubscribe');

    // Authentication routes


    Route::prefix('auth')->name('auth.')->group(function () {

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::post('recover', [AuthController::class, 'recover'])->name('recover');

        Route::post('reset', [AuthController::class, 'reset'])->name('reset');

        Route::post('resend', [AuthController::class, 'resend'])->name('resend');

        Route::post('verify', [AuthController::class, 'verify'])->name('verify');

        Route::get('profile', [AuthController::class, 'user'])->middleware('auth:api')->name('profile');
        
    });

    // Product routes

    Route::prefix('product')->name('product.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');
        
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

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/{slug}', [CategoryController::class, 'single'])->name('single');

        Route::get('delete/{slug}', [CategoryController::class, 'destroy'])->name('delete');

        Route::post('create', [CategoryController::class, 'store'])->name('create');

        Route::put('update', [CategoryController::class, 'store'])->name('update');
        
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
        
    });

});

Route::prefix('v2')->group(function () {

});

Route::prefix('v3')->group(function () {

});
