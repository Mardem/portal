<doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $info->nome }} | Portfolio do Portal Formosa</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolioV2/portfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

    <script src="https://unpkg.com/feather-icons"></script>
        <style>
            .jumbotron {
                background-color: {{ $padrao->fundoCor }} !important;
            }

            .jnoty-container .jnoty-close {
                display: none;
            }
            :root {
                --corLabelProdutos: {{ $padrao->fundoCor }};
                --corOfertasFundo: {{ $padrao->fundoCor }};
                --corOfertasFrente: {{ $padrao->fundoCor }};
                --txtPrincipal: {{ $padrao->fundoCor }};
            }

            .linha-produtos {
                background-color: {{ $padrao->fundoCor }};
            }

            .sobre-title,
            .ache-nos-title {
                color: var(--txtPrincipal);
            }
            .corOfertasFundo {
                fill: {{ $padrao->fundoOferta }} !important;
            }

            .corOfertasFrente {
                fill: {{ $padrao->frenteOferta }}   !important;
            }

            .corLabelProdutos {
                fill: {{ $padrao->fundoProduto }}   !important;

            }
        </style>
        @yield('links-css')
</head>
<body>
@section('nome', $info->nome)
@include('layouts.portfolioV2.components.show.navbar')
@include('layouts.portfolioV2.components.show.content')
@include('layouts.portfolioV2.components.show.footer')



<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"><\/script>')</script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/default/site/lazy.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.easeScroll.min.js') }}"></script>
<script src="{{ asset('js/default/animatescroll.min.js') }}"></script>

@yield('scripts-src')
<script>

    $("html").easeScroll();
    $('img').on('dragstart', function (e) {
        e.preventDefault();
    });
    feather.replace();

</script>

</body>
</html>