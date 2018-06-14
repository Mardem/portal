<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.default.components.seo')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('titlePage') Portal Formosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <script src="https://unpkg.com/feather-icons"></script>
    @include('layouts.default.components.styles')
    @yield('styles-src')
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">Você está usando um navegador <strong>antigo</strong>. Por favor <a
        href="https://browsehappy.com/">atualize seu navegador</a> para uma melhor experiência e segurança.</p>
<![endif]-->

@yield('navbar-eventos')

<main class="section-wrap bg-form">
        @yield('container')
</main>


<footer class="footer-site-padrao">
    <a href="{{ route('inicio') }}">Portal Formosa &copy; 2018</a>
</footer>

<script>
    feather.replace()
</script>
@include('layouts.default.components.scripts')
@component('layouts.default.components.alert-success-error')
@endcomponent
@yield('script-src')

</body>
</html>
