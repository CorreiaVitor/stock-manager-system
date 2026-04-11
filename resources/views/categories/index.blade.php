@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div class="mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1">Categorias</h1>
                <p class="text-muted mb-0">
                    Organize os grupos de produtos do sistema.
                </p>
            </div>

            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary px-4">
                    Nova categoria
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="fw-semibold">Lista de categorias</div>
        </div>

        <div class="card-body p-0">
            @if ($categories->isEmpty())
                <div class="p-4 text-center text-muted">
                    Nenhuma categoria cadastrada até o momento.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Nome</th>
                                <th>Descrição</th>
                                <th class="text-center">Qtd. de produtos</th>
                                <th class="text-end pe-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="fw-semibold ps-4">{{ $category->name }}</td>
                                    <td>{{ $category->description ?: '—' }}</td>
                                    <td class="text-center">{{ $category->products_count }}</td>
                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                Editar
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
