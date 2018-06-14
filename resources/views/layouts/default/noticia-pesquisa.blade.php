<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Portal Formosa GO - Seu portal de notícias</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  @include('layouts.default.components.styles')

  @yield('styles-src')

</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">Você está usando um navegador <strong>antigo</strong>. Por favor <a
    href="https://browsehappy.com/">atualize seu navegador</a> para uma melhor experiência e segurança.</p>
<![endif]-->

<header>
  @include('layouts.default.components.menu-noticia')
</header>

<main class="section-wrap">
  @yield('container')
</main>

@include('layouts.default.components.scripts')
@yield('script-src')

</body>
</html>
