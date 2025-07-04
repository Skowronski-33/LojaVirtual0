<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{id}', [ShopController::class, 'show'])->name('shop.product');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Rotas completas para Products
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/new', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::post('/products/update', [ProductsController::class, 'update'])->name('products.update');
Route::post('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.delete');

// Rotas completas para Types
Route::get('/types', [TypesController::class, 'index'])->name('types.index');
Route::get('/types/new', [TypesController::class, 'create'])->name('types.create');
Route::post('/types', [TypesController::class, 'store'])->name('types.store');
Route::get('/types/edit/{id}', [TypesController::class, 'edit'])->name('types.edit');
Route::post('/types/update', [TypesController::class, 'update'])->name('types.update');
Route::post('/types/delete/{id}', [TypesController::class, 'destroy'])->name('types.delete');

// Rotas completas para Suppliers
Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/new', [SuppliersController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/edit/{id}', [SuppliersController::class, 'edit'])->name('suppliers.edit');
Route::post('/suppliers/update', [SuppliersController::class, 'update'])->name('suppliers.update');
Route::post('/suppliers/delete/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
