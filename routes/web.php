<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('.index');
Route::get('/product/{id}', [\App\Http\Controllers\HomeController::class, 'product'])->name('.product');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add', function() {
   return redirect()->route('.index');
});
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index']);

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/register', [UsersController::class, 'create'])->name('register');
Route::post('/register', [UsersController::class, 'store']);
