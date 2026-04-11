@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <div class="mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1">Produtos</h1>
                <p class="text-muted mb-0">
                    Gerencie os produtos cadastrados no sistema.
                </p>
            </div>

            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary px-4">
                    Novo produto
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Busca e filtros</div>
        </div>

        <div class="card-body p-4">
            <form method="GET" action="{{ route('products.index') }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="search" class="form-label fw-semibold">Buscar por nome</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Ex: Coca-Cola">
                    </div>

                    <div class="col-md-4">
                        <label for="category_id" class="form-label fw-semibold">Filtrar por categoria</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Todas as categorias</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="form-label d-none d-md-block">&nbsp;</label>
                        <button type="submit" class="btn btn-outline-primary">
                            Filtrar
                        </button>
                    </div>
                </div>

                @if (request()->filled('search') || request()->filled('category_id'))
                    <div class="mt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary">
                            Limpar filtros
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Lista de produtos</div>
        </div>

        <div class="card-body p-0">
            @if ($products->isEmpty())
                <div class="p-4 text-center text-muted">
                    Nenhum produto encontrado com os filtros informados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Produto</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Estoque mínimo</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="{{ $product->quantity <= $product->minimum_stock ? 'table-warning' : '' }}">
                                    <td class="ps-4">
                                        <div class="fw-semibold">{{ $product->name }}</div>
                                        <small class="text-muted">
                                            {{ $product->description ?: 'Sem descrição' }}
                                        </small>
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->minimum_stock }}</td>
                                    <td>
                                        @if ($product->quantity <= $product->minimum_stock)
                                            <span class="badge text-bg-warning">
                                                Estoque baixo
                                            </span>
                                        @else
                                            <span class="badge text-bg-success">
                                                Em estoque
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                Editar
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
