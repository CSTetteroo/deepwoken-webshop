<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [App\Http\Controllers\HomePageController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard routes for authenticated users
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    // Product routes
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Cart routes
    Route::resource('cart', CartController::class);
});

// Admin routes for product management
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'isAdmin']], function() {
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
