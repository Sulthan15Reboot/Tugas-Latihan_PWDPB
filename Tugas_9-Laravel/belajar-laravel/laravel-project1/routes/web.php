<?php

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

use App\Http\Controllers\ProductController;

Route::delete('/products',[ProductController::class, 'destroyAll'])->name('products.destroyAll');
Route::get('/products',[ProductController::class, 'search'])->name('product.search');

Route::resource('products',ProductController::class);