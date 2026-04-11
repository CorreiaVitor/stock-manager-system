@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="row">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h1 class="h3 mb-3">Partial de alertas funcionando</h1>

                <p class="text-muted mb-4">
                    Agora o layout já está preparado para exibir mensagens globais do sistema.
                </p>

                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge text-bg-primary">Blade</span>
                    <span class="badge text-bg-secondary">Bootstrap</span>
                    <span class="badge text-bg-success">Vite</span>
                </div>
            </div>
        </div>
    </div>
@endsection
