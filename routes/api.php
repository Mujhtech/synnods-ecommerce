<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubCategoryController;

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

Route::get('/', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'Api is up and running'
    ], 200, $request->header());
});

Route::group(['prefix' => 'v1'], function () {

    // Authentication routes

    Route::prefix('auth')->name('auth.')->group(function () {

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        
    });

    // Product routes

    Route::prefix('product')->name('product.')->group(function () {
        
    });

    // Category routes 

    Route::prefix('category')->name('category.')->group(function () {
        
    });


    // User routes

    Route::prefix('user')->name('user.')->group(function () {
        
    });

});

Route::prefix('v2')->group(function () {

});

Route::prefix('v3')->group(function () {

});
