@extends('layouts.default.dashboard')

@section('localSite', 'Pesquisa de usuário')
@section('title', 'Dados de '. $u->name . ' - Portal Formosa')

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

    <div class="card" align="center">
      <h1 class="ion-person">
        {{ $u->name }}
      </h1>
    </div>

    <div class="card">
      <div class="row">
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p>
            <i class="fa fa-user" aria-hidden="true"></i> Nome completo: <b class="text-primary">{{ $u->name }}</b>
          </p>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p class="ion-at"> Endereco de E-Mail: <b class="text-primary">{{ $u
            ->email
            }}</b>
          </p>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p>
            <i class="fa fa-industry" aria-hidden="true"></i> Empresas Vinculadas:
            @if($u->empresa == '')
              <b class="text-danger">
                <i class="fa fa-times-rectangle" aria-hidden="true"></i> Nenhuma vinculada
              </b>
            @else
              <b class="text-primary">
                {{ $empresas }}
              </b>
            @endif
          </p>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col-sm-6">
          <p>
            <i class="fa fa-user-circle" aria-hidden="true"></i> CPF:
            @if($u->cpf == '')
              <b class="text-danger">
                <i class="fa fa-times-rectangle" aria-hidden="true"></i> Nenhum cadastrado
              </b>
            @else
              <b class="text-primary">
                @php
                  echo Crypt::decryptString($u->cpfView);
                @endphp
              </b>
            @endif
          </p>
        </div>
        <div class="col-sm-6">
          <p>
            <i class="fa fa-industry" aria-hidden="true"></i> CNPJ:
            @if($u->cnpj == '')
              <b class="text-danger">
                <i class="fa fa-times-rectangle" aria-hidden="true"></i> Nenhum cadastrado
              </b>
            @else
              <b class="text-primary">
                @php
                  echo Crypt::decryptString($u->cnpjView);
                @endphp
              </b>
            @endif
          </p>
        </div>
      </div>
      <hr>

      @if($u->cpf == '' || $u->cnpj == '')
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="container">
              <form method="post" action="{{ route('atualizarUsuario') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $u->id }}">
                <fieldset class="form-group row">
                  <legend class="col-form-legend col-sm-1-12">Complete os dados</legend>
                  <div class="col-sm-1-12">
                    @if($u->cpf == '')
                      <div class="form-group">
                        <label>CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" aria-describedby="helpId" value="{{
                        $u->cpf }}">
                        <small id="helpId" class="text-muted">Preencha com seu CPF</small>
                      </div>
                    @else
                    @endif

                    @if($u->cnpj == '')
                      <div class="form-group">
                        <label>CNPJ:</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control" aria-describedby="helpId"
                               value="{{
                        $u->cnpj
                         }}">
                        <small id="helpId" class="text-muted">Preencha com seu CNPJ</small>
                      </div>
                    @else
                    @endif
                  </div>
                </fieldset>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-save" aria-hidden="true"></i> Salvar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      @else
        <div align="center">
          <h1 class="lead text-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Todas informações cadastradas!
          </h1>
        </div>
      @endif

      <form action="{{ route('pesquisarEmpresa') }}" class="form-fluid" method="post">
        @csrf
        <fieldset class="form-group row">
          <legend class="col-form-legend col-sm-1-12">Vinculos</legend>
          <div class="col-sm-1-12">
            <input type="hidden" value="{{ $u->id }}" name="usuario">
            <div class="form-group">
              <label>Vincular empresa:</label>
              <input type="text" name="cnpj" id="cnpj" class="form-control" aria-describedby="helpId" value="">
              <small id="helpId" class="text-muted">Pesquise um CNPJ para vincular a empresa com o usuário</small>
            </div>
          </div>
          <button type="submit" class="btn btn-primary ion-ios-search-strong">
            Pesquisar
          </button>
        </fieldset>
      </form>
      <br>
      <fieldset class="form-group row">
        <legend class="col-form-legend col-sm-1-12">Empresas vinculadas</legend>
        <div class="col-sm-1-12">
          <div class="form-group">
            <div class="table-responsive">
              <table class="table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vinculoEmpresa as $empresa)
                  <tr>
                    <td scope="row">{{ $empresa->id }}</td>
                    <td>{{ $empresa->nome }}</td>
                    <td>
                      <a href="{{ route('verEmpresa', [$empresa->id]) }}" class="btn btn-primary ion-eye"> Ver</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
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

  <script>
    $('#cpf').inputmask("999.999.999-99");  //static mask
    $('#cnpj').inputmask("99.999.999/9999-99");  //static mask
  </script>
@endsection