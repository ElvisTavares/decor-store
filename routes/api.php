<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Products\StoreProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
   Route::post('/store', StoreProductController::class)->name('.store');
    Route::get('/test', \App\Http\Controllers\Products\StoreProductController::class);
});

//Route::post('/cart/update', [CartController::class, 'add'])->name('.update');
