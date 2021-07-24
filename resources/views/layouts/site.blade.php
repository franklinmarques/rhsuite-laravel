<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home') | {{ env('APP_NAME', 'RhSuite App') }}</title>
    <meta name="description" content="Automação de RH">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/icons/favicon.ico') }}"/>

    <!-- MAIN CSS -->
@include('layouts/css')

<!-- CUSTOM CSS -->
@yield('css')

<!-- MAIN STYLES -->
    <style>
        body {
            background-image: url('{{ asset(isset($imagem_fundo) ? 'imagens/usuarios/' . $imagem_fundo : 'assets/images/fdmrh3.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

    <!-- CUSTOM STYLES -->

    @yield('styles')


</head>
<body class="login-page">

{{--@if(strlen($video_fundo) > 0)
    <video autoplay loop poster="{{ asset('assets/images/' . $imagem_fundo) }}" class="background-video">
        <source src="{{ asset('assets/videos/' . $video_fundo) }}" type="video/mp4">
    </video>
@endif--}}

<div id="cookie" class="text-danger text-center" style="background-color: #ffe; display: none;">
    Este site usa Cookies! Habilite o uso de cookies em seu navegador para o correto funcionamento do site.
</div>

<div class="container">

    @hasSection('logo')
        @yield('logo')
    @endif

    @yield('content')

</div>

@include('layouts/footer')

<!-- MAIN JS -->
@include('layouts/js')

<!-- CUSTOM JS -->
@yield('js')

<!-- MAIN SCRIPTS -->
@include('layouts/scripts')

<!-- CUSTOM SCRIPTS -->
@yield('scripts')

</body>
</html>
