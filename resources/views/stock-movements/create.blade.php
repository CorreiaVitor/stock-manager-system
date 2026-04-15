@extends('layouts.app')

@section('title', 'Nova movimentação')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h1 class="h3 mb-1">Nova movimentação</h1>
                    <p class="text-muted mb-0">
                        Registre uma entrada ou saída de estoque para um produto.
                    </p>
                </div>

                <div>
                    <a href="{{ route('stock-movements.index') }}" class="btn btn-outline-secondary px-4">
                        Voltar ao histórico
                    </a>
                </div>
            </div>

            <div class="alert alert-light border mb-4">
                <div class="fw-semibold mb-2">Antes de registrar</div>
                <ul class="mb-0">
                    <li>Use <strong>entrada</strong> quando o estoque aumentar.</li>
                    <li>Use <strong>saída</strong> quando o estoque diminuir.</li>
                    <li>A justificativa da movimentação ajuda no histórico do sistema.</li>
                </ul>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <div class="fw-semibold">Formulário de movimentação</div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ $formAction ?? '#' }}" method="POST">
                        @csrf

                        @include('stock-movements._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection