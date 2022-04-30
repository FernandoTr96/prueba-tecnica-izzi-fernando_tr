<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\products\ProductController;

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

//rutas publicas
Route::middleware(['guest','preventBackHistory'])->group(function () {
    Route::get('/', [LoginController::class,'index'])->name('loginPage');
    Route::post('/login', [LoginController::class,'loginWithEmailAndPassword'])->name('login');
    Route::get('/register', [RegisterController::class,'index'])->name('registerPage');
    Route::post('/register/create-account', [RegisterController::class,'create'])->name('createAccount');
});

//rutas privadas
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('homePage');
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/add-product', [ProductController::class,'addProductPage'])->name('addProductsPage');
    Route::post('/add-product/create', [ProductController::class,'create'])->name('createProduct');
});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/admin-products', [ProductController::class,'adminProductsPage'])->name('adminProductsPage');
    Route::delete('/admin-products/destroy', [ProductController::class,'destroy'])->name('destroyProduct');
    Route::get('/admin-products/show/{id}', [ProductController::class,'show'])->name('showProduct');
    Route::put('/admin-products/update', [ProductController::class,'update'])->name('updateProduct');
});