<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route accueil
Route::get('/', [HomeController::class, 'home'])->name('home');

// Route d'inscription
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registerUser', [RegisterController::class, 'registerUser'])->name('registerUser');

// Route de connexion
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/loginUser', [LoginController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route d'admin

Route::prefix('/admin')->name('admin.')->group(function () {
    
    Route::get('/', [LoginController::class, 'admin'])->name('admin');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create/createUser', [UserController::class, 'store'])->name('createUsers');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create/createProduct', [ProductController::class, 'store'])->name('createProduct');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/productUser', [ProductUserController::class, 'showAll'])->name('productUser');
});



Route::prefix('/productUser')->name('productUser.')->group(function () {
    Route::get('show/{id}', [ProductUserController::class, 'showProductUser'])->name('show');
    Route::post('/store', [ProductUserController::class, 'store'])->name('store');
    Route::delete('/delete/{id}', [ProductUserController::class, 'delete'])->name('delete');
});