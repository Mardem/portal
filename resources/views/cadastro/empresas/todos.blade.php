@extends('layouts.default.dashboard')

@section('localSite', 'Todas empresas cadastradas')
@section('title', 'Todas empresas cadastradas -  Dashboard - Portal Formosa')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Todas Empresas</li>
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
          <h2 class="counter">{{ $empresasCount }}</h2>
          <p class="m-b-0">Todas empresas cadastradas</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <br>
    <div align="right">
      <a href="{{ route('cadastroNovaEmpresa') }}" class="btn btn-danger" style="margin-right: 10px"><i class="fa fa-plus"></i> Novo</a>
    </div>
    </div>

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
            <th>Nome</th>
            <th>Endereço</th>
            <th>CNPJ</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>

          @foreach($e as $empresa)
            <tr>
              <td>{{ $empresa->id }}</td>
              <td>{{ $empresa->nome }}</td>
              <td>{{ $empresa->endereco }}</td>
              <td>
                @if($empresa->cnpjView == '')
                  <b class="text-danger ion-close-round"> Não cadastrado</b>
                  @else
                  @php
                    echo Crypt::decryptString($empresa->cnpjView);
                  @endphp
                @endif
              </td>
              <td>
                <a href="{{ route('verEmpresa', [$empresa->id]) }}" class="btn btn-success ion-eye" style="margin-right: 10px"> Ver</a>
                <a href="{{ route('apagarEmpresa', [$empresa->id]) }}" class="btn btn-success ion-ios-trash-outline" style="margin-right: 10px">Apagar</a>
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