<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    @include('site.layouts._partials.topo')

    @yield('conteudo')

    @if ($__env->yieldContent('rodape'))
        @include('site.layouts._partials.rodape')
    @endif
</body>

</html>
