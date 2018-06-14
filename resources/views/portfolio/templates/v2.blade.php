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
    <link rel="stylesheet" href="{{ asset('css/portfolioV2/portfolioEdit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/vendor/bootstrap-color-picker/dist/css/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('js/vendor/jnotify/jnoty.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/vendor/driver/driver.min.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/jspanel4@4.0.0/dist/jspanel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    @if($padrao->count() != 0)
        <style>
            .jumbotron {
                background-color: {{ $padrao->fundoCor }}    !important;
            }

            .jnoty-container .jnoty-close {
                display: none;
            }
        </style>

    @if($padrao != null)
            @if($padrao->fundoCor != null)
                <style>
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
                </style>
            @endif
        @endif

        <style>

            @if($padrao->fundoOferta == '' || $padrao->fundoOferta == null)
            @else
                .corOfertasFundo {
                fill: {{ $padrao->fundoOferta }}  !important;
            }

            .corOfertasFrente {
                fill: {{ $padrao->frenteOferta }}  !important;
            }

            @endif

        @if($padrao->fundoProduto == '' || $padrao->fundoProduto == null)
        @else
            .corLabelProdutos {
                fill: {{ $padrao->fundoProduto }}  !important;

            }
            @endif
        </style>
    @endif
    @yield('links-css')
</head>
<body>
@section('nome', $info->nome)

@include('layouts.portfolioV2.components.navbar')
@include('layouts.portfolioV2.components.content')
@include('layouts.portfolioV2.components.footer')
@include('layouts.portfolioV2.components.modal')

<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"><\/script>')</script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/default/site/lazy.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap-color-picker/dist/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.easeScroll.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.0.0/dist/jspanel.js"></script>
<script src="{{ asset('js/default/animatescroll.min.js') }}"></script>
<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-jeditable/dist/jquery.jeditable.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
<script src="{{ asset('js/vendor/jnotify/jnoty.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.limitText.min.js') }}"></script>
@yield('scripts-src')
<script src="{{ asset('js/portfolio-v2.min.js') }}"></script>
<script>

    @if($padrao == null)
    msgBemVindo('{{ $nome }}');
    @else
    @endif

    $("html").easeScroll();
    $('img').on('dragstart', function (e) {
        e.preventDefault();
    });
    feather.replace();

</script>

@if(Session::has('error'))
    <script>
        swal({
            title: "Ocorreu um erro!",
            text: "{{ Session::get('error') }}",
            button: "OK!",
            icon: "error"
        });
    </script>
@endif
@if(Session::has('success'))
    <script>
        swal({
            title: "Tudo certo",
            text: "{{ Session::get('success') }}",
            button: "OK!",
            icon: "success"
        });
    </script>
@endif

</body>
</html>