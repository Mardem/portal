@extends('layouts.default.v2.eventos')
@section('titlePage', 'Divulgue grátis o seu evento em Formosa | ')

@section('metaDescription', 'Precisa de divulgar seu evento e não sabe como fazer? Simples, deixe com o Portal Formosa que cuidamos de tudo! Divulgamos seu evento grátis sem custo nenhum. Divulgue seu evento com maior facilidade no Facebook, Twitter ou Instragram. Portal Formosa aqui você encontra!')
@section('metaKeywords', 'cadastrar evento, evento online, eventos em formosa, divulgar, divulgar grátis, evento grátis, evento no facebook, festas, evento na internet, festa na internet, festa online, evento online, evento cultural, evento cultural em formosa, divulgar sem pagar, pagar nada')
@section('metaRobots', 'index, follow')
@section('canonical', route('inicio'))
@section('container')

    <section class="evento-principal" aria-label="Pessoas em um evento do portal formosa go">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12" align="right">
                    <ul class="menu-evento">
                        <li class="item-evento"><a href="{{ route('inicio') }}" class="link-evento"><i
                                        class="icon ion-ios-home"></i> Portal</a></li>
                        <li class="item-evento"><a href="{{ route('indexPlanos') }}" class="link-evento"><i
                                        class="icon ion-ios-pricetag"></i> Planos</a></li>
                        <li class="item-evento"><a href="{{ route('cadastrarMinhaEmpresa') }}" class="link-evento"><i
                                        class="icon ion-ios-jet"></i> Cadastrar Empresa</a></li>
                        <li class="item-evento"><a href="{{ route('login') }}" class="link-evento"><i
                                        class="icon ion-ios-contact"></i> Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 titulos" align="center">
                    <h1 class="titulo-principal">
                        <b><span style="color: #ffbe00"><i class="fa fa-bullhorn"
                                                           aria-hidden="true"></i> Divulgue</span>
                            seu evento <span style="color: #23fd90;">online</span></b>
                    </h1>
                    <h2 class="subtitulo">
                        Você precisa de <b style="color: #ffbe00">divulgar um evento</b>? Nós temos a <b
                                style="color: #74e3f5;">solução para você</b>!
                        Anuncie sua <b>festa</b> ou <b>evento</b> que você esteja em mente. Tenha uma forma profissional
                        de divulgação
                        do seu evento no <i><a href="https://www.facebook.com/">Facebook</a></i>, <i><a
                                    href="https://twitter.com/">Twitter</a></i> ou <i><a
                                    href="https://www.instagram.com/">Instagram</a></i> isso tudo de graça*.
                        <br>
                        <div style="margin-top: 10px;">
                            Aproveite, os eventos culturais são totalmente grátis!
                        </div>
                    </h2>
                    <a href="#cadastrar" class="btn btn-cadastrar">Cadastrar</a>
                    <a href="{{ route('todosEventos') }}" class="btn btn-eventos">Eventos</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="margin:60px 0;">

                    <h2 align="center">
                        Cadastre seu <span style="color: #f46ef7;">evento</span> no <span style="color: #6af1ff">Portal Formosa</span>
                    </h2>

                    <p class="lead" style="text-align: center;color: #101010;">
                        O Portal Formosa está aqui para divulgar seu evento de uma forma facilitada todos os eventos que
                        estão cadastrados no portal elas poderão ser compartilhada em suas redes sociais como Facebook,
                        Twitter e outros!
                        Compartilhe também o link direto da sua página personalizada!

                    </p>

                    <div class="card">

                        <small>
                            <i>
                                * Preencha todos os campos abaixo
                                <br>
                                Eventos do tipo cultural são grátis outros tipos de eventos e festas irão passar por uma
                                análise
                            </i>
                        </small>
                        <br>
                        <form action="{{ route('salvarEvento') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="text-center lead">
                                        <i data-feather="user"></i> Dados pessoais
                                    </p>
                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nome" class="form-control"
                                                   placeholder=" Digite seu nome" aria-describedby="helpId" required>
                                        </div>

                                        <small id="helpId" class="text-muted">
                                            <i>Seu nome completo</i>
                                        </small>
                                    </div>

                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="cpf" id="cpf" class="form-control"
                                                   placeholder=" Digite seu CPF" aria-describedby="helpId" required>
                                        </div>

                                        <small id="helpId" class="text-muted">
                                            <i>Para garantirmos que não é um robô precisamos de um CPF válido para
                                                verificação</i>
                                        </small>
                                    </div>

                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="telefone" class="form-control"
                                                   placeholder=" Número de telefone" aria-describedby="helpId" required>
                                        </div>

                                        <small id="helpId" class="text-muted">
                                            <i>Entraremos em contato por telefone</i>
                                        </small>
                                    </div>

                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-at" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder=" Endereço de email" aria-describedby="helpId">
                                        </div>

                                        <small id="helpId" class="text-muted">
                                            <i>Enviaremos um link de confirmação por email</i>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <p class="lead text-center">
                                        <i data-feather="speaker"></i> Evento
                                    </p>

                                    <!-- Evento -->

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-pencil"></i>
                                                </span>
                                        </div>
                                        <input type="text" name="evento" class="form-control"
                                               placeholder=" Nome do evento" aria-describedby="helpId" required>
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>O nome do evento é necessário para a publicação</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </span>
                                        </div>
                                        <input type="text" name="dia" id="dia" class="form-control"
                                               placeholder=" Que dia o evento acontecerá?" required
                                               aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Mostraremos o dia do seu evento no local de divulgação</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                        </div>
                                        <input type="text" name="horas" id="horas" class="form-control"
                                               placeholder=" Que horas o evento acontecerá?" aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Mostraremos a hora do evento no local de divulgação</i>
                                    </small>
                                    <!-- /Evento -->
                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map-signs"></i>
                                                </span>
                                        </div>
                                        <input type="text" name="endereco" class="form-control"
                                               placeholder=" Qual o endereço do evento?" aria-describedby="helpId"
                                               required>
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Precisamos de um endereço para criarmos a rota</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span>
                                        </div>
                                        <textarea name="descricao" style="resize: none;height: auto" rows="2"
                                                  class="form-control"
                                                  placeholder=" Faça uma descrição sobre seu evento"></textarea>
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Use com consciência os caracteres disponíveis para criar uma boa chamada</i>
                                    </small>
                                    <!-- /Evento -->
                                </div>

                                <div class="col-sm-4">
                                    <p class="lead text-center">
                                        <i data-feather="thumbs-up"></i> Social
                                    </p>

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-facebook-official"></i>
                                                </span>
                                        </div>
                                        <input type="url" name="facebook" class="form-control"
                                               placeholder=" Link do Facebook" aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Caso você tenha uma página ou postagem no <b
                                                    style="color: #151ffb;">Facebook</b> insira neste local</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                        </div>
                                        <input type="url" name="twitter" class="form-control"
                                               placeholder=" Link do Twitter" aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Caso você tenha um perfil ou postagem no <b
                                                    style="color: #20a1ff">Twitter</b> insira neste local</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-instagram"></i>
                                                </span>
                                        </div>
                                        <input type="url" name="instagram" class="form-control"
                                               placeholder=" Link do Instagram" aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Caso você tenha um perfil ou postagem no <b
                                                    style="color: #ffeb00">Instagram</b> insira neste local</i>
                                    </small>
                                    <!-- /Evento -->

                                    <!-- Evento -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-youtube"></i>
                                                </span>
                                        </div>
                                        <input type="url" name="youtube" class="form-control"
                                               placeholder=" Link do Youtube" aria-describedby="helpId">
                                    </div>
                                    <small id="helpId" class="text-muted">
                                        <i>Caso você tenha um vídeo no <b style="color: #f42700">Youtube</b> insira
                                            neste local</i>
                                    </small>
                                    <!-- /Evento -->

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-5 mb-5">
                                    <p class="lead text-center">
                                        <i data-feather="image"></i> Banner
                                    </p>

                                    <!-- Evento -->
                                    <div class="form-group">
                                        <p class="lead">Selecione um banner:</p>
                                        <input type="file" name="banner" onchange="loadFile(event)" id="imgInp" class="form-control" required>
                                    </div>
                                    <!-- /Evento -->
                                </div>

                                <div class="col-sm-6 mt-5 mb-5">
                                    <h5 class="lead" align="center">
                                        <i data-feather="aperture"></i> Pré-visualização:
                                    </h5>

                                    <img id="previewBanner"
                                         src="http://via.placeholder.com/500x300" alt="Previsualização do banner"/>
                                    <small id="helpId" class="text-muted">
                                        <i>Este banner será apresentado na capa do seu evento</i>
                                    </small>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-5 mb-5">
                                    <h2 align="center"><i data-feather="info"></i><span style="color: #00b8d2;"> Informações</span>
                                        sobre <b style="color: #00a25f;">apresentação</b></h2>

                                    <div id="accordionPrecos" role="tablist" aria-multiselectable="true">
                                        <div class="card" style="box-shadow: none;padding: 2px;">
                                            <div class="card-header" role="tab" id="precosHeader">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordionPrecos"
                                                       href="#precosContent" aria-expanded="true"
                                                       aria-controls="precosContent">
                                                        <i data-feather="dollar-sign"></i>
                                                        Evento pago
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="precosContent" class="collapse " role="tabpanel"
                                                 aria-labelledby="precosHeader">
                                                <div class="card-block p-1">
                                                    <div class="row">
                                                        <div class="col-sm-6">

                                                            <!-- Evento -->
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="valor" class="form-control"
                                                                       placeholder=" Valor do ingresso"
                                                                       aria-describedby="helpId">
                                                            </div>
                                                            <small id="helpId" class="text-muted">
                                                                <i>Informe o valor que é cobrado, caso haja ingresso</i>
                                                            </small>
                                                            <!-- /Evento -->

                                                        </div>

                                                        <div class="col-sm-6">
                                                            <!-- Evento -->
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-globe"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="valor" class="form-control"
                                                                       placeholder=" Coloque todos os sites de vendas"
                                                                       aria-describedby="helpId">
                                                            </div>
                                                            <small id="helpId" class="text-muted">
                                                                <i>Se houver venda em sites, adicone aqui todos. <b>Para
                                                                        adicionar mais de um site adicione uma
                                                                        vírgula.</b></i>
                                                            </small>
                                                            <!-- /Evento -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button class="btn btn-primary btn-block"><i data-feather="send"></i> Mandar para avaliação
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>


@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/navbar-nivel-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/evento.min.css') }}">
    <link href="{{ asset('css/default/dashboard/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/timepicker/mdtimepicker.min.css') }}">

@endsection

@section('script-src')
    <script src="{{ asset('js/vendor/animatescroll/animatescroll.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="{{ asset('assets/pignose/js/pignose.calendar.full.min.js') }}"></script>
    <script src="{{ asset('assets/timepicker/mdtimepicker.js') }}"></script>
    <script src="{{ asset('js/eventos.min.js') }}"></script>
@endsection