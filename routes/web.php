<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard.view');

    Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'list'])->name('transactions.view');
    Route::get('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'detail'])->name('transaction.detail');

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'list'])->name('products.view');
    Route::post('/add-to-cart', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');

    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users.view');
    // Add more authenticated routes here
});
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');