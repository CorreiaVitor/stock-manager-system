@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5 col-xl-4">
            <div class="mb-4 text-center">
                <h1 class="h3 mb-1">Entrar no sistema</h1>
                <p class="text-muted mb-0">
                    Faça login para acessar o gerenciamento de estoque.
                </p>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <div class="fw-semibold">Autenticação</div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') }}" placeholder="voce@exemplo.com" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Senha</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Digite sua senha">
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember"
                                @checked(old('remember'))>
                            <label class="form-check-label" for="remember">
                                Lembrar de mim
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
