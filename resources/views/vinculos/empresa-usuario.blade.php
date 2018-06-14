@extends('layouts.default.dashboard')

@section('localSite', 'Vincular dados')
@section('title', 'Vinculo de dados - Portal Formosa')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('todosCadastros') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Meus Dados</li>
  </ol>
@endsection
@section('container')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="card">
        <div align="center">
          Empresa encontrada:
          <h1> <i class="fa fa-industry" aria-hidden="true"></i> {{ $vE->nome }}</h1>
          <a href="{{ route('verEmpresa', [$vE->id]) }}" class="btn btn-primary ion-ios-information-outline">
            Informações</a>
        </div>

      <fieldset class="form-group row">
        <legend class="col-form-legend col-sm-1-12">Vincular com <b>{{ $user->name }}</b></legend>
        <div class="col-sm-1-12">
          <div class="form-group" align="center">
            <br>
            <label class="text-info">
              Ao clicar no botão de iniciar vinculo você estará vinculando o usuário <b class="ion-person">{{ $user->name }}</b> a
              empresa <b class="ion-ios-list-outline">{{ $vE->nome }}.</b>
            </label>
          </div>
        </div>
        <a type="submit" class="btn btn-primary btn-block ion-arrow-swap" href="{{ route('realizarVinculo', [$vE->id,
         $user->id])
        }}">
          Vincular empresa
        </a>
      </fieldset>
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