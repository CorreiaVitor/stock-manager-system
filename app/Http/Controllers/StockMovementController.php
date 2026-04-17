<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMovementRequest;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use League\Config\Exception\ValidationException as ExceptionValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StockMovementController extends Controller
{

    private int $previousQuantity;
    private int $currentQuantity;

    public function index(Request $request)
    {
        $products = Product::query()->get();
        $movements = StockMovement::query()->with('product')

            ->when($request->filled('product_id'), fn($query) => $query
                ->where('product_id', $request->integer('product_id')
            ))
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('type'));
            })

            ->when($request->filled('date_from'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->input('date_from'));
            })

            ->when($request->filled('date_to'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->input('date_to'));
            })->latest()->get();

        return view('stock-movements.index', compact('products', 'movements'));
    }

    public function create()
    {
        $products = Product::query()->get();
        return view('stock-movements.create', compact('products',));
    }

    public function store(StoreStockMovementRequest $request)
    {

        $validated = $request->validated();

        DB::transaction(function () use ($validated) {

            $product = Product::lockForUpdate()
                ->findOrFail($validated['product_id']);

            $this->previousQuantity = $product->quantity;

            if ($validated['type'] === 'entry') {
                $this->currentQuantity = $this->previousQuantity + $validated['movement_quantity'];
            } else {
                if ($this->previousQuantity <= $validated['movement_quantity'])
                    throw ValidationException::withMessages(['quantity' => 'Quantidade indisponível no estoque.']);

                $this->currentQuantity = $this->previousQuantity - $validated['movement_quantity'];
            }

            StockMovement::create([
                'product_id' => $product->id,
                'type' => $validated['type'],
                'quantity' => $validated['movement_quantity'],
                'previous_quantity' => $this->previousQuantity,
                'current_quantity' => $this->currentQuantity,
                'description' => $validated['description'] ?? null
            ]);

            $product->update(
                [
                    'quantity' => $this->currentQuantity
                ]
            );
        });

        return to_route('stock-movements.index')->with('success', 'Movimentação registrada com sucesso.');
    }
}
