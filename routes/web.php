<?php

use App\Http\Controllers\ProductController;
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
    return view('main');
});

Route::get('products',[ProductController::class,'index'])->name('product.index');

Route::get('create',[ProductController::class,'create'])->name('product.create');

Route::POST('store',[ProductController::class,'store'])-> name('product.store');

Route::get('edit/product/{id}',[ProductController::class,'Edit']);

Route::get('delete/product/{id}',[ProductController::class,'Delete']);

Route::post('update/product/{id}',[ProductController::class,'Update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
