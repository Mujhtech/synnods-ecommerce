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
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\CheckoutController;

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

Route::prefix('v3')->group(function () {

});
