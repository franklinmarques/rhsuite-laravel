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
@include('layouts/styles')

<!-- CUSTOM STYLES -->
    @yield('styles')


</head>
<body>

<section id="container-fluid">

    @include('layouts/navbar')

    @include('layouts/menu')

    <section id="main-content">
        <section class="wrapper">

            @hasSection('header')
                <nav aria-label="breadcrumb">
                    @yield('header')
                    {{--<li style="float: right;">
                        <a id="maximize" role="button" onclick="maximizeMainContent();" class="text-white"
                           title="Maximizar"><i class="fa fa-window-maximize"></i></a>
                        <a id="restore" role="button" onclick="restoreMainContent();" class="text-white"
                           title="Restaurar"><i class="fa fa-window-restore"></i></a>
                    </li>--}}
                </nav>
            @endif

            @yield('content')

        </section>
    </section>

</section>

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
