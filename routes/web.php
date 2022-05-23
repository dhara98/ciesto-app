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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('shops', \App\Http\Controllers\ShopController::class);
Route::get('products/list/{shop_id}', [\App\Http\Controllers\ShopController::class, 'getProductLists'])->name('products.list');

Route::post('file-import/{shop_id}', [\App\Http\Controllers\ShopController::class, 'fileImport'])->name('file-import');
Route::get('file-export/{shop_id}', [\App\Http\Controllers\ShopController::class, 'fileExport'])->name('file-export');