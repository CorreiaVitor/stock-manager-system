@extends('layouts.app')

@section('title', 'Nova categoria')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="mb-4">
                <h1 class="h3 mb-1">Nova categoria</h1>
                <p class="text-muted mb-0">
                    Preencha os dados abaixo para cadastrar uma nova categoria.
                </p>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <div class="fw-semibold">Formulário de cadastro</div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        @include('categories._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
