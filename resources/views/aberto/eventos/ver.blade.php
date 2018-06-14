@extends('layouts.default.v2.eventos')
@section('titlePage', 'Divulgue grátis o seu evento em Formosa | ')

@section('metaDescription', 'Precisa de divulgar seu evento e não sabe como fazer? Simples, deixe com o Portal Formosa que cuidamos de tudo! Divulgamos seu evento grátis sem custo nenhum. Divulgue seu evento com maior facilidade no Facebook, Twitter ou Instragram. Portal Formosa aqui você encontra!')
@section('metaKeywords', 'cadastrar evento, evento online, eventos em formosa, divulgar, divulgar grátis, evento grátis, evento no facebook, festas, evento na internet, festa na internet, festa online, evento online, evento cultural, evento cultural em formosa, divulgar sem pagar, pagar nada')
@section('metaRobots', 'index, follow')
@section('canonical', route('inicio'))

@section('navbar-eventos')
    <nav class="navbar-evento">
        <ul>
            <li><a href="">Link</a></li>
            <li><a href="">Link</a></li>
            <li><a href="">Link</a></li>
            <li><a href="">Link</a></li>
        </ul>
    </nav>
@endsection
@section('container')

    <section class="container-fluid">
        <div class="row pt-3">
            <div class="col-sm-4">
                <img src="http://via.placeholder.com/500x600" style="max-width: 100%;" alt="">
            </div>
            <div class="col-sm-4 content-info">
                <h1 align="center" class="texto-chamada">Evento X</h1>
                <h2 class="texto-descricao">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at, consectetur cupiditate dolores ea eveniet exercitationem facere impedit inventore laboriosam nam qui saepe totam vel veritatis. Consequatur debitis labore numquam.
                </h2>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        Data: <b class="evento">25/04/2018</b>
                    </div>
                    <div class="col-sm-6">
                        Local: <b class="evento">Av. Valeriano de Castro 479 - Centro</b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        Contato:
                    </div>
                    <div class="col-sm-4">Telefone:</div>
                    <div class="col-sm-4">Email:</div>
                </div>

            </div>
            <div class="col-sm-4">
                <iframe style="width: 100%;height: 315px" src="https://www.youtube.com/embed/GYtJasHCFQs?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <br>
@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/navbar-nivel-2.min.css') }}">
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/ver-eventos.min.css') }}" rel="stylesheet">
@endsection

@section('script-src')
    <script src="{{ asset('js/vendor/animatescroll/animatescroll.min.js') }}"></script>
@endsection