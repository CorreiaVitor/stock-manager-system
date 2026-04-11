@extends('layouts.app')

@section('title', 'Editar categoria')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="mb-4">
                <h1 class="h3 mb-1">Editar categoria</h1>
                <p class="text-muted mb-0">
                    Atualize as informações da categoria selecionada.
                </p>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <div class="fw-semibold">Formulário de edição</div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route("categories.update", $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('categories._form', ['category' => $category])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection