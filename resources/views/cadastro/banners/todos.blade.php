@extends('layouts.default.dashboard')

@section('localSite', 'Todos banners cadastrados')
@section('title', 'Todos banners cadastrados -  Dashboard - Portal Formosa')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Todos Banners</li>
    </ol>
@endsection
@section('container')

    <div class="offset-md-3 col-md-4">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="ion-ios-bookmarks-outline f-s-40 color-danger"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="counter">{{ $bCount }}</h2>
                    <p class="m-b-0">Todos banners cadastrados</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div align="right">
            <a href="{{ route('criarBanner') }}" class="btn btn-danger" style="margin-right: 10px"><i
                        class="fa fa-plus"></i> Novo</a>
        </div>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert" style="background-color: #2783d2;" align="center">
            <strong style="color: #fff">{{ Session::get('success') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="row">
            @foreach($banners as $banner)
                <div class="col-sm-3 card">
                    <img src="{{ asset($banner->imagem) }}" height="146" alt="">
                    <hr>
                    <div class="card-title" align="center">
                        <a href="{{ url($banner->link) }}" class="ion-link"> {{ $banner->nome }}</a>
                    </div>
                    <hr>
                    <ul>
                        <li style="display: inline-block">
                            <form action="{{ route('apagarBanner') }}" method="post">
                                @csrf
                                <input type="text" class="hidden" name="id" value="{{ $banner->id }}">
                                <input type="text" class="hidden" name="imagem" value="{{ $banner->imagem }}">
                                <button type="submit" class="btn btn-danger ion-ios-trash-outline"> Apagar</button>
                            </form>
                        </li>
                        <li style="display: inline-block;float: right;">
                            @if($banner->ativo == md5(1))
                                <a href="{{ route('desativarBanner', [$banner->id, 0]) }}" class="btn btn-primary ion-ios-circle-outline"> Desativar</a>
                                @else
                                <a href="{{ route('desativarBanner', [$banner->id, 1]) }}" class="btn btn-primary ion-record"> Ativar</a>
                            @endif
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script-src')
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
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

    @if(Session::has('error'))
        <script>
            swal({
                title: "Ops!",
                text: "{{ Session::get('error') }}",
                button: "OK!",
                icon: "error"
            });
        </script>
    @endif
@endsection