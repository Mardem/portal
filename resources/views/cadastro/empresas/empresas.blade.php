@extends('layouts.default.dashboard')

@section('localSite', 'Cadastro de empresas')
@section('title', 'Cadastro de empresas - Portal Formosa')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('todosCadastros') }}">Cadastro</a></li>
    <li class="breadcrumb-item active">Empresas</li>
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
    <form action="{{ route('salvarEmpresa') }}" method="post" class="card" data-toggle="validator"  enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Nome da empresa</label>
        <input name="nome" type="text" class="form-control" value="{{ old('titulo') }}">
        <small class="text-muted">Escreva o nome fantasia da empresa a ser cadastrada</small>
      </div>

      <div class="form-group">
        <label>Categoria da empresa</label>
        <select name="categoria" class="form-control" required>
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->nome }}">{{ $categoria->nome }}</option>
          @endforeach
        </select>
        <small class="text-muted">
          Selecione em que a notícia se encaixa
          <a href="#categoria">Não encontrou?</a>
        </small>
      </div>
      <div class="form-group">
        <label>Endereço da empresa</label>
        <input name="endereco" type="text" class="form-control" value="{{ old('endereco') }}">
        <small class="text-muted">Escreva o endereço da empresa</small>
      </div>
      <div class="form-group">
        <label>Bairro</label>
        <input name="bairro" type="text" class="form-control" value="{{ old('bairro') }}">
        <small class="text-muted">Escreva o bairro da empresa</small>
      </div>
      <div class="form-group">
        <label>Cidade</label>
        <input name="cidade" type="text" class="form-control" value="{{ old('cidade') }}">
        <small class="text-muted">Escreva a cidade da empresa</small>
      </div>
      <div class="form-group">
        <label>Estado</label>
        <select name="estado" class="form-control">
          <option value="GO">Goiás</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
        <small class="text-muted">Escreva a cidade da empresa</small>
      </div>
      <div class="form-group">
        <label>Nº da Empresa</label>
        <input name="numero" type="text" class="form-control" value="{{ old('numero') }}">
        <small class="text-muted">Escreva a número da empresa</small>
      </div>
      <div class="form-group">
        <label>Telefone</label>
        <input name="telefone" type="text" class="form-control" value="{{ old('telefone') }}" id="telefone">
        <small class="text-muted">Digite o número de telefone da empresa</small>
      </div>
      <div class="form-group">
        <label>CNPJ</label>
        <input name="cnpj" type="text" class="form-control" value="{{ old('cnpj') }}" id="cnpj">
        <small class="text-muted">Insira o CNPJ da empresa</small>
      </div>
      <button class="btn btn-primary">
        <i class="fa fa-save"></i>
        Salvar
      </button>
    </form>

    @include('layouts.default.components.cadastrar-categoria-empresa')

  </div>
@endsection

@section('script-src')
  <script src="{{ asset('node_modules/trumbowyg/dist/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('js/vendor/bootstrap-color-picker/dist/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/noticias.min.js') }}"></script>
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
    $('#telefone').inputmask("(99) 9999-9999");  //static mask
    $('#cnpj').inputmask("99.999.999/9999-99");  //static mask
  </script>
@endsection

@section('links-src')
  <link rel="stylesheet" href="{{ asset('node_modules/trumbowyg/dist/ui/trumbowyg.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/vendor/bootstrap-color-picker/dist/css/bootstrap-colorpicker.css') }}">
@endsection