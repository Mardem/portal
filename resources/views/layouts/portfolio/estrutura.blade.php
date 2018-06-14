<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('tituloPort', 'Portfólio de Empresa') - Portal Formosa</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('port/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link href="{{ asset('port/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('port/vendor/devicons/css/devicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('port/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('port/css/resume.min.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('/assets/owl/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/owl/dist/assets/owl.theme.default.css') }}">
    @yield('links-src')
</head>

<body id="page-top">
@php
    try {
    $cor = '';
        if ($pegaPadroes->barralateral == '') {
                $cor = '';
        } else {
            $cor = $pegaPadroes->barralateral;
        }
} catch(\Exception $e) {
}
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav"
     style="background-color: {{ $cor }} !important;">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">@yield('nomeEmpresa', 'Empresa Portal Formosa')</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="@yield('imagemPrincipal')" alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><ion-icon name="menu" style="font-size: 35px"></ion-icon></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#products">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">promoções</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Mapa</a>
            </li>
        </ul>
    </div>
</nav>
@yield('container')

<footer style="text-align: right">
    <i class="lead" style="font-size: 15px;margin-right: 10px">
        {{ $portfolio->nome }} gerado pelo <a href="{{ route('inicio') }}">Portal Formosa</a>
    </i>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('port/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('port/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('port/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('port/js/resume.min.js') }}"></script>

@yield('scripts-src')
</body>
</html>
