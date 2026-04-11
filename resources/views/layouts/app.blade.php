<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Controle de Estoque')</title>

    @vite('resources/js/app.js')
</head>

<body class="bg-light">
    @include('partials.navbar')

    <main class="py-4">
        <div class="container">
            @include('partials.alerts')

            @yield('content')
        </div>
    </main>

   @include('partials.footer')
</body>

</html>
