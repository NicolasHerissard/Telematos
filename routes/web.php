<?php

use App\Http\Controllers\HomeController;
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

// Route de connexion et inscription
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/loginUser', [UserController::class, 'loginUser'])->name('loginUser');

// Route de création utilisateur
Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
});