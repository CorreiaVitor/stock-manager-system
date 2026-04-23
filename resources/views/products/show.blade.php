@extends('layouts.app')

@section('title', 'Detalhes do produto')

@section('content')
    <div class="mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1">{{ $product->name }}</h1>
                <p class="text-muted mb-0">
                    Acompanhe as informações e o histórico deste produto.
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">
                    Voltar
                </a>

                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary px-4">
                    Editar produto
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Categoria</div>
                    <div class="fw-semibold">{{ $product->category->name }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Preço</div>
                    <div class="fw-semibold">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Quantidade atual</div>
                    <div class="fw-semibold">{{ $product->quantity }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Estoque mínimo</div>
                    <div class="fw-semibold">{{ $product->minimum_stock }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <div>
                    <span class="text-muted small d-block">Status</span>

                    @if ($product->quantity <= $product->minimum_stock)
                        <span class="badge text-bg-warning">Estoque baixo</span>
                    @else
                        <span class="badge text-bg-success">Em estoque</span>
                    @endif
                </div>

                <div class="flex-grow-1">
                    <span class="text-muted small d-block">Descrição</span>
                    <div>{{ $product->description ?: 'Sem descrição informada.' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Histórico de movimentações do produto</div>
        </div>

        <div class="card-body p-0">
            @forelse ($movements as $movement)
                <div class="border-bottom p-4">
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        @if ($movement->type === 'entry')
                            <span class="badge text-bg-success">Entrada</span>
                        @else
                            <span class="badge text-bg-danger">Saída</span>
                        @endif

                        <div class="fw-semibold">
                            Quantidade: {{ $movement->quantity }}
                        </div>
                    </div>

                    <div class="text-muted small mb-2">
                        Registrado em {{ $movement->created_at }} por {{ $movement->user->name }}
                    </div>

                    <div class="row g-3 small">
                        <div class="col-sm-4">
                            <div class="text-muted">Estoque anterior</div>
                            <div class="fw-semibold">{{ $movement->previous_quantity }}</div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-muted">Estoque atual</div>
                            <div class="fw-semibold">{{ $movement->current_quantity }}</div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-muted">Observação</div>
                            <div class="fw-semibold">{{ $movement->description ?: 'Sem observação' }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-5 text-center">
                    <div class="mb-2 fw-semibold">Este produto ainda não possui movimentações</div>
                    <div class="text-muted">
                        Quando entradas e saídas forem registradas, o histórico aparecerá aqui.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @if ($movements->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $movements->onEachSide(1)->links() }}
        </div>
    @endif
@endsection
