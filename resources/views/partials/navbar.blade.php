<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ url('/') }}">
            Controle de Estoque
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Alternar navegação"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/') }}"
                    >
                        Início
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-semibold' : '' }}"
                        href="{{ route('categories.index') }}"
                    >
                        Categorias
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('products.*') ? 'active fw-semibold' : '' }}"
                        href="{{ route('products.index') }}"
                    >
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('stock-movements.*') ? 'active fw-semibold' : '' }}"
                        href="{{ route('stock-movements.create') }}"
                    >
                       Movimentações
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>