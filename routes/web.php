<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// Route::get('/produtos', function (Request $request) {
//     $categories = collect([
//         (object) ['id' => 1, 'name' => 'Bebidas'],
//         (object) ['id' => 2, 'name' => 'Limpeza'],
//         (object) ['id' => 3, 'name' => 'Frios'],
//     ]);

//     $products = collect([
//         (object) [
//             'id' => 1,
//             'name' => 'Coca-Cola 2L',
//             'description' => 'Refrigerante garrafa pet',
//             'price' => 9.99,
//             'quantity' => 20,
//             'minimum_stock' => 5,
//             'category' => (object) ['id' => 1, 'name' => 'Bebidas'],
//         ],
//         (object) [
//             'id' => 2,
//             'name' => 'Detergente Neutro',
//             'description' => 'Frasco 500ml',
//             'price' => 3.50,
//             'quantity' => 3,
//             'minimum_stock' => 4,
//             'category' => (object) ['id' => 2, 'name' => 'Limpeza'],
//         ],
//         (object) [
//             'id' => 3,
//             'name' => 'Queijo Mussarela',
//             'description' => 'Peça fracionada',
//             'price' => 42.90,
//             'quantity' => 2,
//             'minimum_stock' => 2,
//             'category' => (object) ['id' => 3, 'name' => 'Frios'],
//         ],
//         (object) [
//             'id' => 4,
//             'name' => 'Água Mineral 500ml',
//             'description' => 'Garrafa sem gás',
//             'price' => 2.50,
//             'quantity' => 30,
//             'minimum_stock' => 10,
//             'category' => (object) ['id' => 1, 'name' => 'Bebidas'],
//         ],
//     ]);

//     $search = $request->string('search')->toString();
//     $categoryId = $request->string('category_id')->toString();

//     $products = $products
//         ->when($request->filled('search'), function ($products) use ($search) {
//             return $products->filter(function ($product) use ($search) {
//                 return str($product->name)
//                     ->lower()
//                     ->contains(str($search)->lower());
//             });
//         })
//         ->when($request->filled('category_id'), function ($products) use ($categoryId) {
//             return $products->filter(function ($product) use ($categoryId) {
//                 return (string) $product->category->id === $categoryId;
//             });
//         })
//         ->values();

//     return view('products.index', compact('products', 'categories'));
// })->name('products.index');