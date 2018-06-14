<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  @include('layouts.default.components.seo')
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Portal Formosa - Aqui você encontra!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  @include('layouts.default.components.styles')
  <link rel="stylesheet" href="{{ asset('/assets/owl/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/owl/dist/assets/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/menu.min.css') }}">
  @yield('styles-src')


</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">Você está usando um navegador <strong>antigo</strong>. Por favor <a
    href="https://browsehappy.com/">atualize seu navegador</a> para uma melhor experiência e segurança.</p>
<![endif]-->

<header>
  @include('layouts.default.components.menu')
</header>

<main class="section-wrap">
  @yield('container')
</main>

@include('layouts.default.components.scripts')
@yield('script-src')


</body>
</html>
