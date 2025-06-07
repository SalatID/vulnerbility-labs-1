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

Route::middleware(['custom.auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard.view');

    Route::middleware(['auth.admin'])->group(function () {
    });
    
    Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'list'])->name('transactions.view');
    Route::get('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'detail'])->name('transaction.detail');

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'list'])->name('products.view');
    
    Route::post('/add-to-cart', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
    Route::get('/carts', [App\Http\Controllers\ProductController::class, 'cartList'])->name('carts.view');
    Route::get('/cart/remove/{id}', [App\Http\Controllers\ProductController::class, 'cartList'])->name('cart.remove');

    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users.view');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'addUser'])->name('users.store');
    Route::put('/users/{id}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('user.update');
    Route::delete('/users/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('user.delete');
    Route::get('/users/{id}', [App\Http\Controllers\AdminController::class, 'userDetail'])->name('user.detail');
    
    
    Route::get('/roles', [App\Http\Controllers\AdminController::class, 'listRoles'])->name('roles.view');
    Route::post('/roles', [App\Http\Controllers\AdminController::class, 'addRole'])->name('roles.store');
    Route::get('/roles/{id}', [App\Http\Controllers\AdminController::class, 'detailRole'])->name('roles.detail');

    Route::get('/profile',[App\Http\Controllers\AdminController::class, 'profile'])->name('profile.view');
    Route::put('/profile',[App\Http\Controllers\AdminController::class, 'updateProfile'])->name('profile.update');
    // Add more authenticated routes here
});
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');