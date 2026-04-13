<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMovementRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StockMovementController extends Controller
{
    public function store(StoreStockMovementRequest $request, Product $product)
    {
        DB::transaction(
            function () use ($request, $product) {
                $product = Product::query()->lockForUpdate()->findOrfail($product->id);

                $data = $request->validated();

                $data['moved_at'] = $data['moved_at'] ?? now();

                if ($data['type'] === 'exit' && $data['quantity'] > $product->stock) {
                    throw ValidationException::withMessages([
                        'quantity' => 'A quantidade de saída não pode ser maior que o estoque disponível.',
                    ]);
                }

                $newStock = $data['type'] === 'entry' 
                    ? $product->stock + $data['quantity'] 
                    : $product->stock - $data['quantity'];

                    $product->update([
                        'stock' => $newStock
                    ]);

                $product->stockMovements()->create($data);

                return back()->with('success', 'Movimentação registrada com sucesso.');
            }
        );
    }
}
