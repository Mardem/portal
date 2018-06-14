@extends('layouts.default.dashboard')

@section('localSite', 'Todas notificações recebidas ')
@section('title', 'Todas notificações recebidas -  Dashboard - Portal Formosa')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Todas notificações</li>
  </ol>
@endsection
@section('container')

  <div class="offset-md-3 col-md-4">
    <div class="card p-30">
      <div class="media">
        <div class="media-left meida media-middle">
          <span><i class="ion-android-notifications f-s-40 color-danger"></i></span>
        </div>
        <div class="media-body media-text-right">
          <h2 class="counter">{{ $totalNotificacoes }}</h2>
          <p class="m-b-0">Todas notificações recebidas</p>
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
            <th>Assunto</th>
            <th>Remetente</th>
            <th>Finalizado</th>
            <th>Mensagem</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>

          @foreach($notificacoes as $notificacao)
            <tr>
              <td>
                {{ $notificacao->id }}
              </td>
              <td>
                {{ $notificacao->assunto }}
              </td>
              <td>
                {{ $notificacao->remetente }}
              </td>
              <td>
                @if($notificacao->finalizado == 1)
                  <b class="text-success">Finalizado</b>
                  @else
                  <b class="text-danger">Não finalizado</b>
                @endif
              </td>
              <td>
                <i>{{ substr($notificacao->texto, 0, 40) }} ...</i>
              </td>
              <td>
                <a href="{{ route('verNotificacao', [$notificacao->id]) }}" class="btn btn-success ion-eye" style="margin-right: 10px"> Ver</a>
                <a href="{{ route('finalizarNotificacao', [$notificacao->id]) }}" class="btn btn-success ion-checkmark-round" style="margin-right: 10px"> Finalizar</a>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('script-src')
@component('layouts.default.components.alert-success-error')
@endcomponent
@endsection