@extends('layouts.default.dashboard')

@section('localSite', 'Meu dados')
@section('title', 'Meus dados - Portal Formosa')

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
      <div class="row">
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p>
           <i class="fa fa-user" aria-hidden="true"></i> Nome completo: <b class="text-primary">{{ Auth::user()->name }}</b>
          </p>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p>
            <i class="fa fa-hashtag" aria-hidden="true"></i> Endereco de E-Mail: <b class="text-primary">{{ Auth::user()
            ->email
            }}</b>
          </p>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px">
          <p>
            <i class="fa fa-industry" aria-hidden="true"></i> Empresa Vinculada:
            @if(Auth::user()->empresa == '')
              <b class="text-danger">
                <i class="fa fa-times-rectangle" aria-hidden="true"></i> Nenhuma vinculada
              </b>
              @else
              <b class="text-primary">{{ Auth::user()->empresa }}</b>
            @endif
          </p>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col-sm-6">
          <p>
            <i class="fa fa-user-circle" aria-hidden="true"></i> CPF:
            @if(Auth::user()->cpf == '')
              <b class="text-danger">
                <i class="fa fa-times-rectangle" aria-hidden="true"></i> Nenhum cadastrado
              </b>
              @else
              <b class="text-primary">
                {{ Auth::user()->cpf }}
              </b>
            @endif
          </p>
        </div>
      </div>
      <hr>

      @if(Auth::user()->cpf == '' || Auth::user()->cpf == md5(''))
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="container">
              <form method="post" action="{{ route('atualizarUsuario') }}">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <fieldset class="form-group row">
                  <legend class="col-form-legend col-sm-1-12">Complete os dados</legend>
                  <div class="col-sm-1-12">
                      <div class="form-group">
                        <label>CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" aria-describedby="helpId" value="{{
                        Auth::user()->cpf }}">
                        <small id="helpId" class="text-muted">Preencha com seu CPF</small>
                      </div>
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
    $('#cpf').inputmask("999.999.999-99");
    $('#dataCNPJ').inputmask("99.999.999/9999-99");
  </script>
@endsection