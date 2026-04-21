<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalCategories = Category::count();

        $totalProducts = Product::count();

        $lowStockProducts = Product::query()
            ->whereColumn('quantity', '<=', 'minimum_stock')
            ->count();

        $movementsToday = StockMovement::query()
            ->whereDate('created_at', today())
            ->count();

        $recentMovements = StockMovement::query()
            ->with(['product', 'user'])
            ->latest()
            ->limit(3)
            ->get();

            //Outra maneira de retornar dados para view
        return view('dashboard.index', [
            'totalCategories' => $totalCategories,
            'totalProducts' => $totalProducts,
            'lowStockProducts' => $lowStockProducts,
            'movementsToday' => $movementsToday,
            'recentMovements' => $recentMovements,
        ]);
    }
}
