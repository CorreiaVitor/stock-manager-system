<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

Route::resourceVerbs([
    'create' => 'criar',
    'edit' => 'editar',
]);

Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::resource('/categorias', CategoryController::class)
        ->except(['show'])
        ->names('categories')
        ->parameters(['categorias' => 'category']);

    Route::resource('/produtos', ProductController::class)
        ->except(['show'])
        ->names('products')
        ->parameters(['produtos' => 'product']);

    Route::resource('/movimentacoes-de-estoque', StockMovementController::class)
        ->except(['edit', 'destroy', 'show', 'update'])
        ->names('stock-movements');
});
