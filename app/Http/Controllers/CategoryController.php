<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category) : View
    {
        $categories = $category->query()->withCount('products')->latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        
        $validated = $request->validated();

        Category::create($validated);

        return to_route('categories.index')->with('success', 'Categoria criada com sucesso');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) : RedirectResponse
    {
        $validated = $request->validated();

        $category->update($validated);

        return to_route('categories.index')->with('success', 'Categoria alterada com sucesso'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) : RedirectResponse
    {
        if ($category->products()->exists()) {
            return to_route('categories.index')->with('error', 'Não é possível excluir esta categoria porque existem produtos vinculados a ela.');
        }

        $category->delete();

        return to_route('categories.index')->with('success', 'Categoria excluida com sucesso.');
    }
}
