@extends('layouts.app')

@section('title', 'Novo produto')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="mb-4">
                <h1 class="h3 mb-1">Novo produto</h1>
                <p class="text-muted mb-0">
                    Preencha os dados abaixo para cadastrar um novo produto.
                </p>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <div class="fw-semibold">Formulário de cadastro</div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        @include('products._form', ['categories' => $categories])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection