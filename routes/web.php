<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/show/{product}', [ProductController::class, 'show'])->name('show');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{product}', [CartController::class, 'store'])->name('cart.add');
    Route::get('/cart/increase/{cart}', [CartController::class, 'increase'])->name('cart.increase');
    Route::get('/cart/decrease/{cart}', [CartController::class, 'decrease'])->name('cart.decrease');
});
