<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;




// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    
});

// routes/web.php
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// routes/web.php
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');


Route::resource('customers', 'App\Http\Controllers\CustomerController');



// Additional authenticated routes
Route::middleware(['auth'])->group(function () {
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('dashboard/products/create', [ProductController::class, 'create'])->name('products.create');
});



// Authentication routes provided by Breeze
require __DIR__ . '/auth.php';
