@extends('layouts.default.v2.noticias')
@section('titlePage', 'Cadastrar sua empresa online no Portal  - ')
@section('metaDescription', 'Aqui desenvolvo a meta description do site')
@section('metaKeywords', 'cadastrar empresa, minha empresa online, aparecer no google')

@section('container')
    @if(Session::has('error'))
        <div class="alert alert-pf" role="alert">
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-pf-s" role="alert">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    <img src="{{ asset('img/svg/fund-cadastrar-empresa.svg') }}" alt="">

    <div class="row">
        <div class="col-sm">
            <div class="container">
                <div class="texto-apresentacao" align="center">
                    <h1>Cadastre sua <span class="empresa">empresa</span> e fique <span class="online">on</span>line
                    </h1>
                </div>
                <hr class="footer-apresentacao">
                <br>
                <p class="lead descricao">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci cum delectus distinctio
                    dolor dolore eaque error impedit, ipsam ipsum minima minus, reiciendis repudiandae tenetur ut
                    veritatis voluptas voluptate? Incidunt!
                </p>
            </div>
        </div>
    </div>

    @auth

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
                                        <span><i class="ion-person icon-pf-input"></i></span>
                                        <input type="text" name="cpf" id="cpf" class="form-control" aria-describedby="helpId" value="{{
                        Auth::user()->cpf }}">
                                        <small id="helpId" class="text-muted">Preencha com seu CPF</small>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-save" aria-hidden="true"></i> Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row ">
                <div class="container">
                    <br><br><br>

                    <div align="right">
                        <small class="text-muted">
                            <b>*</b> Preencha corretamente os campos abaixo. <br> <b>*</b> Alguns desses campos serão
                            visíveis para os usuários quando fizerem a busca por sua empresa.
                        </small>
                    </div>
                    <div class="fgroup">

                        <form action="{{ route('salvarEmpresaOnline') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nome da empresa</label>
                                <span>
                                <i class="ion-ios-bookmarks-outline icon-pf-input"></i>
                            </span>
                                <input name="nome" type="text" class="form-control" required>
                                <small class="text-muted">Escreva o nome fantasia da empresa a ser cadastrada</small>
                            </div>

                            <div class="form-group">
                                <label>Endereço da empresa</label>
                                <span>
                                <i class="ion-navigate icon-pf-input" aria-hidden="true"></i>
                            </span>
                                <input name="endereco" type="text" class="form-control" required>
                                <small class="text-muted">Escreva o endereço da empresa</small>
                            </div>
                            <div class="form-group">
                                <label>Bairro</label>
                                <span><i class="ion-ios-location-outline icon-pf-input"></i></span>
                                <input name="bairro" type="text" class="form-control" required>
                                <small class="text-muted">Escreva o bairro da empresa</small>
                            </div>

                            <div class="form-group">
                                <label>Cidade</label>
                                <span><i class="ion-map icon-pf-input"></i></span>
                                <input name="cidade" type="text" class="form-control" required>
                                <small class="text-muted">Escreva a cidade da empresa</small>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <span>
                                <i class="ion-pin icon-pf-input" style="margin-top: 8px;font-size: 30px;"></i>
                            </span>
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
                                <span><i class="ion-ios-grid-view-outline icon-pf-input"></i></span>
                                <input name="numero" type="text" class="form-control" required>
                                <small class="text-muted">Escreva a número da empresa</small>
                            </div>
                            <div class="form-group">
                                <label>Telefone Fixo</label>
                                <span><i class="ion-ios-telephone-outline icon-pf-input"></i></span>
                                <input name="telefone" type="text" class="form-control" required id="telefone">
                                <small class="text-muted">Digite o número de telefone da empresa</small>
                            </div>
                            <button class="btn btn-primary btn-block">
                                <i class="fa fa-save"></i>
                                Salvar
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endauth

    @guest
        <div class="row">
            <div class="container need-login">
                <h2>
                    Você está a um passo para de ser encontrado na internet!
                    <br>
                    Faça o <a href="{{ route('login') }}" class="auth" id="login">login</a> ou se <a
                            href="{{ route('register') }}" class="auth" id="registro">registre</a>.
                </h2>
            </div>
        </div>
    @endguest

    <br><br><br>

    <h3 align="center" class="comunidade">
        <i>Faça parte desta comunidade!</i>
    </h3>
    <img src="{{ asset('img/svg/footer-2.svg') }}" alt="Imagem do fundo do site representando a comunidade Portal Formosa">
@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/navbar-nivel-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastrar-empresa.min.css') }}">

@endsection

@section('script-src')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script>
        $('#telefone').inputmask("(99) 9999-9999");
        $('#cpf').inputmask("999.999.999-99");
    </script>
@endsection