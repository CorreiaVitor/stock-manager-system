<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categorias/criar', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categorias/salvar', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categorias/{category}/editar', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categorias/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categorias/{category}/deletar', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
Route::get('/produtos/criar', [ProductController::class, 'create'])->name('products.create');
Route::post('/produtos/salvar', [ProductController::class, 'store'])->name('products.store');
Route::get('/produtos/{product}/editar', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produtos/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produtos/{product}/deletar', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('produtos/{product}/stock-movements', [StockMovementController::class, 'store'])->name('products.stock-movements.store');