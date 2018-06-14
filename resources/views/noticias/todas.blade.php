@extends('layouts.default.dashboard')

@section('localSite', 'Todas notícias')
@section('title', 'Todas notícias -  Dashboard - Portal Formosa')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Noticias</li>
  </ol>
@endsection
@section('container')

  <div class="offset-md-4 col-md-3">
    <div class="card p-30">
      <div class="media">
        <div class="media-left meida media-middle">
          <span><i class="fa fa-newspaper-o f-s-40 color-danger"></i></span>
        </div>
        <div class="media-body media-text-right">
          <h2 class="counter">{{ $cNoticias }}</h2>
          <p class="m-b-0">Notícias criadas</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert" style="background-color: #2783d2;" align="center">
        <strong style="color: #fff">{{ Session::get('success') }}</strong>
      </div>
    @endif
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Postado</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($noticias as $noticia)
            <tr>
              <td scope="row">{{ $noticia->id }}</td>
              <td>{{ $noticia->titulo }}</td>
              <td>
                @if($noticia->postado == 0)
                  <b class="text-danger ion-close-round"> Não postado</b>
                @else
                  <b class="text-success ion-checkmark-round"> Postado</b>
                @endif
              </td>
              <td>
                <a href="{{ url($noticia->link) }}" target="_blank" class="btn btn-primary ion-eye" style="width: 100%;margin-bottom: 3px;"> Ver</a>
                <form action="{{ route('apagarNoticia') }}" method="post">
                  @csrf
                  <input type="text" name="id" value="{{ $noticia->id }}" class="hidden">
                  <input type="text" name="imagem" value="{{ $noticia->imagem }}" class="hidden">
                  <button class="btn btn-danger ion-trash-b" type="submit" style="width: 100%;margin-bottom: 3px;"> Apagar</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('links-src')
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection