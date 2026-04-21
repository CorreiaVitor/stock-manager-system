@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1">Dashboard</h1>
                <p class="text-muted mb-0">
                    Visão geral do sistema de controle de estoque.
                </p>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Categorias</div>
                    <div class="display-6 fw-semibold">{{ number_format($totalCategories) }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Produtos</div>
                    <div class="display-6 fw-semibold">{{ number_format($totalProducts) }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Estoque baixo</div>
                    <div class="display-6 fw-semibold">{{ number_format($lowStockProducts) }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Movimentações hoje</div>
                    <div class="display-6 fw-semibold">{{ number_format($movementsToday) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Últimas movimentações</div>
        </div>

        <div class="card-body p-0">
            @forelse ($recentMovements as $movement)
                <div class="border-bottom p-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start gap-3">
                        <div class="flex-grow-1">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                <div class="fw-semibold">
                                    {{ $movement->product->name }}
                                </div>

                                @if ($movement->type === 'entry')
                                    <span class="badge text-bg-success">Entrada</span>
                                @else
                                    <span class="badge text-bg-danger">Saída</span>
                                @endif
                            </div>

                            <div class="text-muted small mb-2">
                                Registrado em {{ $movement->created_at }} por {{ $movement->user->name }}
                            </div>

                            <div class="row g-3 small">
                                <div class="col-sm-4">
                                    <div class="text-muted">Quantidade</div>
                                    <div class="fw-semibold">{{ $movement->quantity }}</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="text-muted">Estoque anterior</div>
                                    <div class="fw-semibold">{{ $movement->previous_quantity }}</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="text-muted">Estoque atual</div>
                                    <div class="fw-semibold">{{ $movement->current_quantity }}</div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="text-muted small">Observação</div>
                                <div>{{ $movement->description ?: 'Sem observação informada.' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-5 text-center">
                    <div class="mb-2 fw-semibold">Ainda não há movimentações recentes</div>
                    <div class="text-muted">
                        Quando o sistema receber entradas e saídas, elas aparecerão aqui.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection