@extends('layouts.app')

@section('title', 'Movimentações de estoque')

@section('content')
    <div class="mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1">Movimentações de estoque</h1>
                <p class="text-muted mb-0">
                    Acompanhe entradas e saídas registradas no sistema.
                </p>
            </div>

            <div>
                <a href="{{ route('stock-movements.create') }}" class="btn btn-primary px-4">
                    Nova movimentação
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Filtros</div>
        </div>

        <div class="card-body p-4">
            <form method="GET" action="{{ $filterAction ?? '#' }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="product_id" class="form-label fw-semibold">Produto</label>
                        <select name="product_id" id="product_id" class="form-select">
                            <option value="">Todos os produtos</option>

                            @foreach ($products ?? collect() as $product)
                                <option value="{{ $product->id }}" @selected((string) request('product_id') === (string) $product->id)>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="type" class="form-label fw-semibold">Tipo</label>
                        <select name="type" id="type" class="form-select">
                            <option value="">Todos os tipos</option>
                            <option value="entry" @selected(request('type') === 'entry')>Entrada</option>
                            <option value="exit" @selected(request('type') === 'exit')>Saída</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="date_from" class="form-label fw-semibold">De</label>
                        <input type="date" name="date_from" id="date_from" class="form-control"
                            value="{{ request('date_from') }}">
                    </div>

                    <div class="col-md-2">
                        <label for="date_to" class="form-label fw-semibold">Até</label>
                        <input type="date" name="date_to" id="date_to" class="form-control"
                            value="{{ request('date_to') }}">
                    </div>

                    <div class="col-md-1 d-grid">
                        <label class="form-label d-none d-md-block">&nbsp;</label>
                        <button type="submit" class="btn btn-outline-primary">
                            Filtrar
                        </button>
                    </div>
                </div>

                @if (request()->filled('product_id') ||
                        request()->filled('type') ||
                        request()->filled('date_from') ||
                        request()->filled('date_to'))
                    <div class="mt-3">
                        <a href="{{ route('stock-movements.index') }}" class="btn btn-sm btn-outline-secondary">
                            Limpar filtros
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Histórico de movimentações</div>
        </div>

        <div class="card-body p-0">
            @forelse (($movements) as $movement)
                <div class="border-bottom p-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start gap-3">
                        <div class="flex-grow-1">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                <div class="fw-semibold">
                                    {{ $movement->product->name ?? 'Produto não informado' }}
                                </div>

                                @if (($movement->type ?? null) === 'entry')
                                    <span class="badge text-bg-success">Entrada</span>
                                @elseif (($movement->type ?? null) === 'exit')
                                    <span class="badge text-bg-danger">Saída</span>
                                @else
                                    <span class="badge text-bg-secondary">Tipo não definido</span>
                                @endif
                            </div>

                            <div class="text-muted small mb-2">
                                Registrado em {{ $movement->created_at ?? '—' }}
                            </div>

                            <div class="row g-3 small">
                                <div class="col-sm-4">
                                    <div class="text-muted">Quantidade</div>
                                    <div class="fw-semibold">{{ $movement->quantity ?? '—' }}</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="text-muted">Estoque anterior</div>
                                    <div class="fw-semibold">{{ $movement->previous_quantity ?? '—' }}</div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="text-muted">Estoque atual</div>
                                    <div class="fw-semibold">{{ $movement->current_quantity ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="text-muted small">Observação</div>
                                <div>
                                    {{ $movement->description ?: 'Sem observação informada.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-5 text-center">
                    <div class="mb-2 fw-semibold">Nenhuma movimentação encontrada</div>
                    <div class="text-muted">
                        Quando o back-end estiver conectado, o histórico de entradas e saídas aparecerá aqui.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
