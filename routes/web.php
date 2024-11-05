<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('dashboard/products/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::resource('products', ProductController::class);
    # creates these routes:
    # GET /dashboard/products
    # GET /dashboard/products/create
    # POST /dashboard/products
    # GET /dashboard/products/{id}
    # GET /dashboard/products/{id}/edit
    # PUT /dashboard/products/{id}
    # DELETE /dashboard/products/{id}
});
