<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {

});

Route::prefix('v2')->group(function () {

});

Route::prefix('v3')->group(function () {

});
