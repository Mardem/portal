<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>@yield('title','Dashboard do usuário - Portal Formosa')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/default/dashboard/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{ asset('css/default/dashboard/lib/calendar2/semantic.ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default/dashboard/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/default/dashboard/lib/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/default/dashboard/lib/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/default/dashboard/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default/dashboard/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .table > thead > tr > th,
        .table > tbody > tr > td {
            text-align: center;
        }
        html,
        p,
        tbody tr td {
            color: #444 !important;
        }
    </style>

    @yield('links-src')
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    Portal Formosa
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted  "
                                                   href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    <!-- Messages -->
                    <li class="nav-item dropdown mega-dropdown"><a class="nav-link dropdown-toggle text-muted  "
                                                                   href="#" data-toggle="dropdown" aria-haspopup="true"
                                                                   aria-expanded="false"><i class="fa fa-th-large"></i></a>
                        <div class="dropdown-menu animated zoomIn">
                            <ul class="mega-dropdown-menu row">


                                <li class="col-lg-12  m-b-30">
                                    <h4 class="m-b-20">Contate-nos</h4>
                                    <!-- Contact -->
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputname1"
                                                   placeholder="Nome"></div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3"
                                                          placeholder="Messagem"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!-- End Messages -->
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>

                            @php
                                $notificacoes = \App\Models\Notification::where('visto', 0)->limit(5)->get();
                            @endphp

                            @if($notificacoes->count() >= 1)
                                <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                            @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                            <ul>
                                <li>
                                    <div class="drop-title">Notificações</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                    @if($notificacoes->count() != 0)
                                            @foreach($notificacoes as $not)
                                                <!-- Message -->
                                                    <a href="{{ route('verNotificacao', ['id' => $not->id]) }}">
                                                        <div class="btn btn-danger btn-circle m-r-10"><i class="{{ $not->icone }}"></i>
                                                        </div>
                                                        <div class="mail-contnet">
                                                            <h5>{{ $not->assunto }}</h5> <span class="mail-desc">{{ substr($not->texto,0, 26) }}...</span>

                                                            <span class="time">
                                                                @php
                                                                $date = new Date($not->created_at);
                                                                echo $date->ago();
                                                                @endphp
                                                            </span>

                                                        </div>
                                                    </a>
                                            @endforeach
                                        @else
                                        <div align="center" style="margin-top: 30px">
                                            <i>Nenhuma notificação.</i>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="{{ route('notificacoes') }}"> <strong>
                                            Ver todas notificações
                                        </strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Comment -->

                @php
                    $mensagens = \App\Models\Message::where('destino', Auth::user()->id)->limit(10)->get();
                @endphp

                    <!-- Messages -->


                    {{--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted" href="#" id="2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                            @if($mensagens->count() >= 1)
                                <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                            <ul>
                                <li>
                                    @if($mensagens->count() > 1)
                                        <div class="drop-title">Você tem {{ $mensagens->count() }} novas mensagens</div>
                                        @else
                                        <div class="drop-title">Você tem {{ $mensagens->count() }} nova mensagem</div>
                                    @endif
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->

                                        @foreach($mensagens as $mensagem)

                                            @php
                                                $date = new Date($mensagem->created_at);
                                            @endphp

                                            <a href="#">
                                                <div class="user-img"><img src="https://picsum.photos/100/100?image=1028" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span></div>
                                                <div class="mail-contnet">
                                                    <h5>{{ $mensagem->titulo }}</h5> <span class="mail-desc">{{ substr($mensagem->mensagem, 0, 26) }}...
                                                    </span> <span class="time">{{ $date->ago() }}</span>
                                                </div>
                                            </a>

                                        @endforeach

                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Ver todas mensagens</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    --}}

                    <!-- End Messages -->
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="https://picsum.photos/100/100" alt="user" class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="{{ route('dadosUsuarios') }}"><i class="fa fa-cog" aria-hidden="true"></i>
                                        Configurações</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                        <i class="fa fa-power-off"></i> Logout

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{--
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                          <ul class="dropdown-user">
                            <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                          </ul>
                        </div>
                        --}}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    @can('admin')
                        <li>
                            <form action="{{ route('pesquisarUsuario') }}" method="post">
                                @csrf
                                <input type="text" name="pesquisa" class="form-control" id="pesquisaCPF"
                                       placeholder=" Pesquisar CPF">
                            </form>
                        </li>
                    @endcan
                    <li class="nav-label">Home</li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span
                                    class="hide-menu">Dashboard</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="{{ route('inicio') }}">Portal Formosa </a></li>
                        </ul>
                    </li>

                    @can('admin')
                        <hr style="margin: 0; border-top: 1px solid rgba(0,0,0,.03);">
                        <li class="nav-label">Notícias</li>
                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit"></i><span
                                        class="hide-menu">Postagem</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('comporNoticia') }}">Criar</a></li>
                                <li><a href="{{ route('todasNoticias') }}">Ver todas</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Cadastros</li>
                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i
                                        class="ion-ios-bookmarks-outline"></i><span
                                        class="hide-menu">Empresas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('todosCadastros') }}" class="ion-eye"> Ver todas</a></li>
                                <li><a href="{{ route('cadastroNovaEmpresa') }}" class="ion-plus-round"> Nova
                                        empresa</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="ion-images"></i><span
                                        class="hide-menu">Banners</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('todosBanners') }}" class="ion-eye"> Ver todos</a></li>
                                <li><a href="{{ route('criarBanner') }}" class="ion-plus-round"> Novo banner</a></li>
                            </ul>
                        </li>

                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-road"></i><span
                                        class="hide-menu">Bairros</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('verBairros') }}" class="ion-eye"> Ver todos</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span
                                        class="hide-menu">Plantões</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('todosPlantoes') }}" class="ion-eye"> Ver todos</a></li>
                                <li><a href="{{ route('criarPlantao') }}" class="ion-plus-round"> Novo plantão</a></li>
                            </ul>
                        </li>
                    @endcan

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">@yield('localSite', 'Dashboard')</h3></div>
            <div class="col-md-7 align-self-center">
                @yield('breadcrumb')
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->

    @yield('container')
    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer" style="text-align: center"> © 2018 Todos direitos reservados.</footer>
    <!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{ asset('js/default/dashboard/lib/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('js/default/dashboard/lib/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('js/default/dashboard/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('js/default/dashboard/jquery.slimscroll.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('js/default/dashboard/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('js/default/dashboard/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<!--Custom JavaScript -->


<!-- Amchart

<script src="{{ asset('js/default/dashboard/lib/morris-chart/raphael-min.js') }}"></script>
<script src="{{ asset('js/default/dashboard/lib/morris-chart/morris.js') }}"></script>
<script src="{{ asset('js/default/dashboard/lib/morris-chart/dashboard1-init.js') }}"></script>
-->


<script src="{{ asset('js/default/dashboard/lib/calendar-2/moment.latest.min.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('js/default/dashboard/lib/calendar-2/semantic.ui.min.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('js/default/dashboard/lib/calendar-2/prism.min.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('js/default/dashboard/lib/calendar-2/pignose.calendar.min.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('js/default/dashboard/lib/calendar-2/pignose.init.js') }}"></script>

<script src="{{ asset('js/default/dashboard/lib/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/default/dashboard/lib/owl-carousel/owl.carousel-init.js') }}"></script>
<script src="{{ asset('js/default/dashboard/scripts.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('js/default/dashboard/custom.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
@component('layouts.default.components.alert-success-error')
@endcomponent
@yield('script-src')
<script>
    $('#pesquisaCPF').inputmask("999.999.999-99");  //static mask
</script>
</body>
</html>
