@if($padrao->count() == 0)
    <div class="alert" style="background-color: #eeeeee;color: #444444;margin-bottom: 0" role="alert">
        <br><br>
        <small>Após você definir um padrão de cor, você poderá modificar todo o seu template.</small>
        <br>
        <strong>Defina um padrão:</strong>

        <form action="{{ route('salvarCoresPortfolio') }}" method="post">
            @csrf

            <input type="hidden" name="empresa" value="{{ $info->id }}">

            <div id="pickerPadrao" class="input-group colorpicker-component"
                 title="Alterar cor da barra lateral">
                <input type="hidden" name="principal" aria-describedby="basic-addon1" value="rgb(29, 196, 219)"
                       id="inputBarra">
                <span class="input-group-addon" id="basic-addon1"
                      style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
            <b> Clique para alterar</b>
        </span>
            </div>
            <button class="btn btn-success btn-block">
                <i data-feather="save"></i>
                Salvar
            </button>
        </form>
    </div>
@else
@endif
<div class="jumbotron jumbotron-fluid" id="home">
    <div class="container txt-entrada">
        <h1 class="texto-chamada" id="nomePrincipal">@yield('nome')</h1>
        <p class="lead lead-descricao" id="lead-descricao-principal" data-izimodal-open="#descricaoPrincipal"
           data-izimodal-transitionin="fadeInDown">
            @if($padrao->count() != null)
                @if($padrao->subtitulo == null || $padrao->subtitulo == '')
                    <b>Edite esta descrição padrão:</b> Apresente sua empresa, coloque sua frase de efeito/impacto,
                    aproveite você tem um grande espaço pra você dizer quem você é!
                @else
                    {{ $padrao->subtitulo }}
                @endif
            @else
            @endif

        </p>

        @if($padrao->count() != 0)
            <div class="row">
                <div class="col-sm-3">
                    <div id="fundoPrincipal" role="tablist" aria-multiselectable="true">
                        <div class="card" style="box-shadow: none">
                            <div class="card-header" role="tab" id="principalHeader">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#fundoPrincipal" href="#secaoPrincipal"
                                       aria-expanded="true" aria-controls="contentPrincipal">
                                        <i data-feather="droplet"></i> Alterar fundo
                                    </a>
                                </h5>
                            </div>
                            <div id="secaoPrincipal" class="collapse in" role="tabpanel"
                                 aria-labelledby="section1HeaderId">
                                <div class="card-block">

                                    <form action="{{ route('mudarCores') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="portfolio" value="{{ $padrao->id }}">
                                        <input type="hidden" name="code" value="0">

                                        <p>
                                            Após selecionar uma cor, o site usará ela como base para reescrever as cores
                                            do
                                            site.
                                        </p>

                                        <div id="pickerPadrao" class="input-group colorpicker-component"
                                             title="Alterar cor da barra lateral">
                                            <input type="hidden" name="principal" aria-describedby="basic-addon1"
                                                   value="{{ $padrao->fundoCor }}"
                                                   id="inputBarra">
                                            <span class="input-group-addon" id="basic-addon1"
                                                  style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
                                            <b> Clique para alterar</b>
                                        </span>
                                        </div>
                                        <button class="btn btn-success btn-block" style="border-radius: 0">
                                            <i data-feather="save"></i>
                                            Salvar
                                        </button>
                                    </form>

                                    <form action="{{ route('mudarCores') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="portfolio" value="{{ $padrao->id }}">
                                        <input type="hidden" name="code" value="4">

                                        <button class="btn btn-danger btn-danger btn-block" style="border-radius: 0">
                                            <i data-feather="trash"></i>
                                            Retornar padrão
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <p style="margin-top: 50px;">
            <img src="{{ asset('img/portfolioV2/logo.png') }}" class="avatar" alt="Avatar">
        </p>
    </div>
</div>

<div class="container conteudo-portfolio">
    <div class="row linha-portfolio">
        <div class="col-sm-12" align="center" id="ofertas">

            <svg version="1.1" class="content-oferta" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 631.1 241.2" style="enable-background:new 0 0 631.1 241.2;" xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }

    .st1 {
        opacity: 0.8;
        fill: #3EBFEF;
    }

    .st2 {
        opacity: 0.1;
    }

    .st3 {
        fill: #231F20;
    }

    .st5 {
        fill: #FFFFFF;
    }

    .st6 {
        fill: #FFFFFF;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }
</style>
                <g>
                    <g>
                        <line id="XMLID_164_" class="st0" x1="252.9" y1="15.8" x2="303.4" y2="15.8"/>
                        <line id="XMLID_163_" class="st0" x1="283.6" y1="26.5" x2="316.1" y2="26.5"/>
                    </g>
                    <g>
                        <line id="XMLID_162_" class="st0" x1="572.8" y1="168" x2="587.1" y2="168"/>
                        <line id="XMLID_161_" class="st0" x1="579.9" y1="161.3" x2="579.9" y2="174.6"/>
                    </g>
                    <g>
                        <line id="XMLID_160_" class="st0" x1="13.3" y1="122.1" x2="27.6" y2="122.1"/>
                        <line id="XMLID_159_" class="st0" x1="20.5" y1="115.5" x2="20.5" y2="128.8"/>
                    </g>
                    <g>
                        <line id="XMLID_158_" class="st0" x1="122.6" y1="16.1" x2="136.9" y2="16.1"/>
                        <line id="XMLID_157_" class="st0" x1="129.8" y1="9.5" x2="129.8" y2="22.8"/>
                    </g>
                    <ellipse id="XMLID_156_" class="st0" cx="609.8" cy="122.1" rx="8.2" ry="7.6"/>
                    <g>
                        <line id="XMLID_155_" class="st0" x1="240.6" y1="207.6" x2="274.5" y2="207.6"/>
                    </g>
                    <g>
                        <polygon id="XMLID_154_" class="corOfertasFundo"
                                 points="54.8,56.2 608.5,21.2 577.4,140 44.4,215.8 		"/>
                        <g>

                            <image style="overflow:visible;" width="575" height="206" id="XMLID_153_" xlink:href="data:image/png;base64,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
QmCC" transform="matrix(1 0 0 1 49.4054 25.7838)">
                            </image>
                        </g>
                    </g>
                    <g>
                        <g class="st2">
                            <g>
                                <polygon id="XMLID_151_" class="st3"
                                         points="87.8,177.9 87.7,171.9 554.6,168.1 573.6,54.9 580.6,55.8 560.7,174.1 				"/>
                            </g>
                        </g>
                        <polygon id="XMLID_150_" class="corOfertasFrente"
                                 points="67.8,33.8 84.7,171.9 554.6,168.2 574.1,51.9 		"/>
                    </g>
                    <polygon id="XMLID_149_" class="st0" points="293.3,195.5 302.1,212.5 313.5,196.8 	"/>
                </g>
                <g id="XMLID_36_">
                    <path id="XMLID_120_" class="st5" d="M253.3,121.1c0,7.5-2,13.4-6.1,17.6c-4.1,4.2-9.5,6.3-16.3,6.3s-12.2-2.1-16.2-6.3
		s-6.1-10.1-6.1-17.6v-17.9c0-7.5,2-13.3,6.1-17.6s9.4-6.4,16.2-6.4c6.7,0,12.2,2.1,16.3,6.4c4.1,4.3,6.2,10.1,6.2,17.6V121.1z
		 M240.9,103c0-4.6-0.9-8-2.5-10.4c-1.7-2.3-4.2-3.5-7.4-3.5c-3.3,0-5.7,1.2-7.4,3.5c-1.6,2.3-2.5,5.8-2.5,10.4v18.1
		c0,4.6,0.8,8.1,2.5,10.4c1.7,2.3,4.1,3.5,7.4,3.5c3.2,0,5.7-1.2,7.4-3.5c1.7-2.3,2.5-5.8,2.5-10.4V103z"/>
                    <path id="XMLID_123_" class="st5"
                          d="M295.7,117.5h-21.7v26.6h-12.5v-64h38.1v10h-25.5v17.4h21.7V117.5z"/>
                    <path id="XMLID_125_" class="st5"
                          d="M340.1,116h-21.5v18.1h25.3v10h-37.8v-64h37.7v10h-25.2v16h21.5V116z"/>
                    <path id="XMLID_127_" class="st5" d="M362.9,118.6v25.4h-12.5V80.1h20.9c6.3,0,11.2,1.7,14.8,5c3.6,3.3,5.4,7.9,5.4,13.9
		c0,3.3-0.7,6.2-2.2,8.6s-3.7,4.3-6.5,5.8c3.3,1.1,5.6,3,7.1,5.5c1.4,2.6,2.2,5.8,2.2,9.7v4.5c0,1.8,0.2,3.6,0.6,5.6
		s1.1,3.5,2.2,4.4v0.9h-12.9c-1-0.9-1.7-2.5-1.9-4.6s-0.4-4.3-0.4-6.5v-4.4c0-3.2-0.7-5.7-2-7.4c-1.3-1.8-3.2-2.6-5.6-2.6H362.9z
		 M362.9,108.6h8.3c2.5,0,4.5-0.8,5.8-2.3c1.3-1.6,2-3.8,2-6.6c0-2.9-0.7-5.3-2-7c-1.3-1.7-3.2-2.6-5.8-2.6h-8.4V108.6z"/>
                    <path id="XMLID_130_" class="st5" d="M435.6,90h-14.4v54h-12.5V90h-14.3v-10h41.2V90z"/>
                    <path id="XMLID_132_" class="st5" d="M466.9,130.4H450l-3.4,13.7H434l18-64h13l18,64h-12.6L466.9,130.4z M452.6,120.4h11.8
		l-5.8-22.6h-0.3L452.6,120.4z"/>
                    <path id="XMLID_135_" class="st5" d="M516.4,127.4c0-2.5-0.6-4.5-1.9-5.9s-3.6-2.9-6.8-4.3c-6.7-2.3-11.6-4.9-15-7.9
		c-3.3-2.9-5-7.1-5-12.4c0-5.2,1.9-9.5,5.8-12.8s8.8-4.9,14.8-4.9c6.1,0,11,1.8,14.9,5.5c3.8,3.7,5.7,8.3,5.5,13.9l-0.1,0.3h-12.1
		c0-2.9-0.7-5.3-2.2-7.1c-1.5-1.8-3.5-2.7-6.2-2.7c-2.5,0-4.4,0.8-5.8,2.3c-1.4,1.5-2.1,3.4-2.1,5.7c0,2.1,0.8,3.8,2.3,5.2
		s4.2,2.9,8.1,4.5c6.1,2.1,10.6,4.7,13.7,7.8c3.1,3.1,4.6,7.4,4.6,12.8c0,5.5-1.8,9.9-5.5,13s-8.6,4.7-14.7,4.7
		c-6.1,0-11.4-1.8-15.8-5.3c-4.5-3.6-6.6-8.7-6.5-15.3l0.1-0.3h12.2c0,4,0.8,6.8,2.5,8.5s4.2,2.6,7.6,2.6c2.6,0,4.6-0.7,5.9-2.1
		C515.8,131.7,516.4,129.8,516.4,127.4z"/>
                </g>
                <g id="XMLID_81_">
                    <g id="XMLID_100_">
                        <g id="XMLID_101_">
                            <g id="XMLID_118_">
                                <path id="XMLID_119_" class="st5" d="M191.6,82.8c-0.4,0-0.9-0.2-1.2-0.5c-0.6-0.7-0.6-1.7,0-2.4c1.1-1.1,1.7-2.5,1.7-3.9
					c0-1.5-0.6-2.9-1.7-3.9c-2.3-2.2-6.1-2.2-8.4,0c-0.7,0.6-1.7,0.6-2.4-0.1c-0.6-0.7-0.6-1.7,0.1-2.4c3.6-3.5,9.5-3.5,13.1,0
					c1.8,1.7,2.7,4,2.7,6.4c0,2.4-1,4.7-2.7,6.4C192.4,82.6,192,82.8,191.6,82.8z"/>
                            </g>
                            <g id="XMLID_116_">
                                <path id="XMLID_117_" class="st6" d="M178.6,72.6"/>
                            </g>
                            <g id="XMLID_114_">
                                <path id="XMLID_115_" class="st6" d="M178.6,72.6"/>
                            </g>
                            <g id="XMLID_112_">
                                <path id="XMLID_113_" class="st5" d="M178.6,74.3c-0.5,0-1-0.2-1.3-0.6c-0.6-0.7-0.5-1.8,0.3-2.4l2.2-1.8
					c0.7-0.6,1.8-0.5,2.4,0.3c0.6,0.7,0.5,1.8-0.3,2.4l-2.2,1.8C179.4,74.1,179,74.3,178.6,74.3z"/>
                            </g>
                            <g id="XMLID_110_">
                                <path id="XMLID_111_" class="st5" d="M165.7,82.8c-0.4,0-0.8-0.2-1.2-0.5c-1.8-1.7-2.7-4-2.7-6.4c0-2.4,1-4.7,2.7-6.4
					c3.6-3.5,9.5-3.5,13.1,0c0.7,0.6,0.7,1.7,0.1,2.4c-0.6,0.7-1.7,0.7-2.4,0.1c-2.3-2.2-6.1-2.2-8.4,0c-1.1,1.1-1.7,2.5-1.7,3.9
					c0,1.5,0.6,2.9,1.7,3.9c0.7,0.6,0.7,1.7,0,2.4C166.6,82.6,166.1,82.8,165.7,82.8z"/>
                            </g>
                            <g id="XMLID_108_">
                                <path id="XMLID_109_" class="st6" d="M178.6,72.6"/>
                            </g>
                            <g id="XMLID_106_">
                                <path id="XMLID_107_" class="st6" d="M178.6,72.6"/>
                            </g>
                            <g id="XMLID_104_">
                                <path id="XMLID_105_" class="st5" d="M178.6,74.3c-0.4,0-0.7-0.1-1.1-0.4l-2.2-1.8c-0.7-0.6-0.8-1.6-0.3-2.4
					c0.6-0.7,1.6-0.8,2.4-0.3l2.2,1.8c0.7,0.6,0.8,1.6,0.3,2.4C179.6,74,179.1,74.3,178.6,74.3z"/>
                            </g>
                            <g id="XMLID_102_">
                                <path id="XMLID_103_" class="st5" d="M178.6,95.6c-1,0-1.9-0.4-2.6-1.1l-11.6-12.2c-0.6-0.7-0.6-1.7,0.1-2.4
					c0.7-0.6,1.7-0.6,2.4,0.1l11.6,12.2c0,0,0.2,0,0.2,0c0,0,0,0,0,0l11.6-12.2c0.6-0.7,1.7-0.7,2.4-0.1c0.7,0.6,0.7,1.7,0.1,2.4
					l-11.6,12.2C180.5,95.2,179.7,95.6,178.6,95.6z"/>
                            </g>
                        </g>
                    </g>
                    <g id="XMLID_92_">
                        <g id="XMLID_97_">
                            <g id="XMLID_98_">
                                <path id="XMLID_99_" class="st5" d="M184.5,148h-52.2c-2.4,0-4.3-1.9-4.3-4.3V76.4c0-2.4,1.9-4.3,4.3-4.3H155
					c0.9,0,1.7,0.8,1.7,1.7c0,0.9-0.8,1.7-1.7,1.7h-22.7c-0.5,0-0.9,0.4-0.9,0.9v67.3c0,0.5,0.4,0.9,0.9,0.9h52.2
					c0.5,0,0.9-0.4,0.9-0.9v-42.9c0-0.9,0.8-1.7,1.7-1.7c0.9,0,1.7,0.8,1.7,1.7v42.9C188.8,146.1,186.8,148,184.5,148z"/>
                            </g>
                        </g>
                        <g id="XMLID_95_">
                            <path id="XMLID_96_" class="st5" d="M176.9,109.2h-20.3c-0.9,0-1.7-0.8-1.7-1.7s0.8-1.7,1.7-1.7h20.3c0.9,0,1.7,0.8,1.7,1.7
				S177.9,109.2,176.9,109.2z"/>
                        </g>
                        <g id="XMLID_93_">
                            <path id="XMLID_94_" class="st5" d="M146.6,109.2h-6.8c-0.9,0-1.7-0.8-1.7-1.7s0.8-1.7,1.7-1.7h6.8c0.9,0,1.7,0.8,1.7,1.7
				S147.5,109.2,146.6,109.2z"/>
                        </g>
                    </g>
                    <g id="XMLID_90_">
                        <path id="XMLID_91_" class="st5" d="M176.9,121h-20.3c-0.9,0-1.7-0.8-1.7-1.7c0-0.9,0.8-1.7,1.7-1.7h20.3c0.9,0,1.7,0.8,1.7,1.7
			C178.6,120.3,177.9,121,176.9,121z"/>
                    </g>
                    <g id="XMLID_87_">
                        <path id="XMLID_89_" class="st5" d="M146.6,121h-6.8c-0.9,0-1.7-0.8-1.7-1.7c0-0.9,0.8-1.7,1.7-1.7h6.8c0.9,0,1.7,0.8,1.7,1.7
			C148.3,120.3,147.5,121,146.6,121z"/>
                    </g>
                    <g id="XMLID_84_">
                        <path id="XMLID_85_" class="st5" d="M176.9,132.8h-20.3c-0.9,0-1.7-0.8-1.7-1.7c0-0.9,0.8-1.7,1.7-1.7h20.3c0.9,0,1.7,0.8,1.7,1.7
			C178.6,132.1,177.9,132.8,176.9,132.8z"/>
                    </g>
                    <g id="XMLID_82_">
                        <path id="XMLID_83_" class="st5" d="M146.6,132.8h-6.8c-0.9,0-1.7-0.8-1.7-1.7c0-0.9,0.8-1.7,1.7-1.7h6.8c0.9,0,1.7,0.8,1.7,1.7
			C148.3,132.1,147.5,132.8,146.6,132.8z"/>
                    </g>
                </g>
</svg>
            <p class="lead lead-descricao-ofertas" id="lead-descricao-oferta" data-izimodal-open="#descricaoOfertas"
               data-izimodal-transitionin="fadeInDown">
                @if($padrao->count() != 0)
                    @if($padrao->txtOferta == null || $padrao->txtOferta == '')
                        Atraia mais clientes usando um texto convicente, demonstre e explique o que você está ofertando
                        em poucas palavas.
                        Seja diferente, seja <b
                                style="font-weight: bold;color: {{ $padrao->fundoCor }}">{{ $info->nome }}!<i
                                    class="fa fa-smile"></i></b>
                    @else
                        {{ $padrao->txtOferta }}
                    @endif
                @else
                    Crie o seu padrão antes de começar a editar!
                @endif

            </p>
        </div>
    </div>

    @if($padrao->count() != 0)


        <div class="row">
            <div class="col-sm-7">
                <div id="colOfertas" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="newOfferHeader">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#colOfertas" href="#contentNewOffer"
                                   aria-expanded="true"
                                   aria-controls="contentNewOffer">
                                    <i data-feather="credit-card"></i> Adicionar oferta
                                </a>
                            </h5>
                        </div>
                        <div id="contentNewOffer" class="collapse in" role="tabpanel" aria-labelledby="newOfferHeader">
                            <div class="card-block">
                                <div class="row" style="margin: 20px 0 40px 0">

                                    <div class="col-12" align="center">
                                        <h2><i data-feather="image"></i> Inserir Ofertas</h2>
                                    </div>

                                    <div class="col-sm-6">
                                        <p class="lead">Aviso importante!</p>
                                        <p>
                                            Após adicionar uma oferta os exemplos abaixo irão sumir. Você pode adicionar
                                            no
                                            máximo
                                            <b>4 Ofertas</b>.
                                        </p>

                                        <p class="lead">
                                            * O Portal Formosa usa um padrão de imagens para não afetar no carregamento
                                            da
                                            página.
                                            <br>
                                            Utilize imagens no tamanho <b>400px</b> de <b>altura</b> e <b>300px</b> de
                                            <b>largua</b>
                                            com o <i>
                                                máximo de 200 kB</i>.
                                            Imagens com tamanhos e dimensões <b class="text-danger">maiores</b> que
                                            essas
                                            poderão
                                            afetar no <b
                                                    class="text-info">tempo de carregamento da página</b>, fique atento!
                                            <br><br>
                                            <i class="text-info"> <i data-feather="info"></i> O Portal Formosa não se
                                                responsabiliza
                                                por imagens
                                                fora dos padrões.</i>
                                        </p>
                                    </div>
                                    <div class="col-sm-6" style="padding-top: 10px">
                                        <form action="{{ route('salvarItem') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="empresa" value="{{ $info->id }}">
                                            <input type="hidden" name="tipo" value="0">
                                            <div class="form-group">
                                                <label><i data-feather="airplay"></i> Imagem</label>
                                                <br>
                                                <small class="text-danger">
                                                    Tamanho: 400x300
                                                </small>
                                                <input type="file" name="img" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label><i data-feather="edit-3"></i> Escreva o nome do produto</label>
                                                <input type="text" name="nome" id="nomeProd" class="form-control"
                                                       placeholder=" Nome do produto"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <label><i data-feather="layers"></i> Descreva o produto</label>
                                                <textarea name="descricao" id="descProd" style="resize: none" rows="5"
                                                          class="form-control"
                                                          placeholder=" Fale um pouco sobre o produto"
                                                          required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label><i data-feather="dollar-sign"></i> Preço (Opcional)</label>
                                                <input type="number" id="precoProd" class="form-control" name="preco"
                                                       placeholder=" R$ 0,00">
                                            </div>

                                            <button class="btn btn-success btn-block" type="submit">
                                                <i data-feather="save"></i> Salvar
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div id="colorsAcord" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headerCoresOfertas">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#colorsAcord" href="#secaoCoresOfertas"
                                   aria-expanded="true" aria-controls="secaoCoresOfertas">
                                    <i data-feather="droplet"></i> Mudar cores
                                </a>
                            </h5>
                        </div>

                        @php
                            if($padrao->count() != 0){
                            if($padrao->fundoOferta != '' || $padrao->fundoOferta != null) {
                                $corFundoOferta = $padrao->fundoOferta;
                            } else {
                                $corFundoOferta = 'rgb(29, 196, 219)';
                            }
                            if($padrao->frenteOferta != '' || $padrao->frenteOferta != null) {
                                $corFrenteOferta = $padrao->frenteOferta;
                            } else {
                                $corFrenteOferta = 'rgb(29, 196, 219)';
                            }
                            if($padrao->fundoProduto != '' || $padrao->fundoProduto != null) {
                                $corFundoProduto = $padrao->fundoProduto;
                            } else {
                                $corFundoProduto = 'rgb(29, 196, 219)';
                            }
                        }
                        @endphp

                        <div id="secaoCoresOfertas" class="collapse in" role="tabpanel"
                             aria-labelledby="headerCoresOfertas">
                            <div class="card-block" style="padding: 10px">

                                @if($padrao->count() != 0)
                                    <form action="{{ route('mudarCores') }}" method="post">
                                        @csrf
                                        <p><i data-feather="corner-left-up"></i> Alterar cor <b
                                                    class="text-danger">frontal</b> do banner</p>
                                        <input type="hidden" name="portfolio" value="{{ $padrao->id }}">
                                        <input type="hidden" name="code" value="2">

                                        <div id="pickerOfertasFrente" class="input-group colorpicker-component"
                                             title="Alterar cor da barra lateral">
                                            <input type="hidden" name="cor" class="corFrente"
                                                   aria-describedby="basic-addon1" value="{{ $corFrenteOferta }}">
                                            <span class="input-group-addon" id="basic-addon1"
                                                  style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
                                        <b> Clique para alterar</b>
                                    </span>
                                        </div>
                                        <button class="btn btn-success btn-block">
                                            <i data-feather="save"></i>
                                            Salvar
                                        </button>
                                    </form>

                                    <hr>

                                    <form action="{{ route('mudarCores') }}" method="post">
                                        @csrf
                                        <p><i data-feather="corner-left-down"></i> Alterar cor de <b
                                                    class="text-danger">fundo</b>
                                            do banner</p>
                                        <input type="hidden" name="portfolio" value="{{ $padrao->id }}">
                                        <input type="hidden" name="code" value="1">

                                        <div id="pickerOfertas" class="input-group colorpicker-component"
                                             title="Alterar cor da barra lateral">
                                            <input type="hidden" name="cor" aria-describedby="basic-addon1"
                                                   value="{{ $corFundoOferta }}" id="inputBarra">
                                            <span class="input-group-addon" id="basic-addon1"
                                                  style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
                                        <b> Clique para alterar</b>
                                    </span>
                                        </div>
                                        <button class="btn btn-success btn-block">
                                            <i data-feather="save"></i>
                                            Salvar
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row linha-ofertas" id="ofertasBox">
        @if($ofertas->count() == 0)

            <div class="col-12 col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title titulo-card-oferta" align="center">PRODUTO</h3>
                        <p class="card-text lead">Some quick example text to build on the card title and
                            make up the bulk of the card's content.</p>
                        <p align="center">
                            <b class="preco-oferta">
                                R$ 10,00
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title titulo-card-oferta" align="center">PRODUTO</h3>
                        <p class="card-text lead">Some quick example text to build on the card title and
                            make up the bulk of the card's content.</p>
                        <p align="center">
                            <b class="preco-oferta">
                                R$ 10,00
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title titulo-card-oferta" align="center">PRODUTO</h3>
                        <p class="card-text lead">Some quick example text to build on the card title and
                            make up the bulk of the card's content.</p>
                        <p align="center">
                            <b class="preco-oferta">
                                R$ 10,00
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title titulo-card-oferta" align="center">PRODUTO</h3>
                        <p class="card-text lead">Some quick example text to build on the card title and
                            make up the bulk of the card's content.</p>
                        <p align="center">
                            <b class="preco-oferta">
                                R$ 10,00
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        @else

            @foreach($ofertas as $oferta)
                <div class="col-12 col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $oferta->link }}" alt="Imagem da empresa {{ $info->nome }}">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-oferta" align="center">{{ $oferta->nome }}</h3>
                            <p class="card-text lead">{{ $oferta->desc }}</p>
                            <p align="center">
                                @if($oferta->preco != null)
                                    <b class="preco-oferta">
                                        R$ {{ $oferta->preco }},00
                                    </b>
                                @endif
                            </p>
                            <div class="row">
                                <div class="col-12" align="center">
                                    <form action="{{ route('removeFile') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="local" value="{{ $oferta->link }}">
                                        <input type="hidden" name="id" value="{{ $oferta->id }}">
                                        <button class="btn btn-outline-danger">Apagar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="linha-banner-produtos" id="produtos">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" align="center">

                <svg version="1.1" class="label-img-produtos" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="-79 186.8 631.1 241.2" style="enable-background:new -79 186.8 631.1 241.2;"
                     xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }

    .stProd2 {
        fill: #FFFFFF;
        opacity: 1
    }
</style>
                    <g>
                        <g>
                            <line class="st0" x1="-43.1" y1="324" x2="-30.5" y2="324"/>
                            <line class="st0" x1="-36.8" y1="317.3" x2="-36.8" y2="330.6"/>
                        </g>
                        <g>
                            <line class="st0" x1="479.1" y1="324.9" x2="491.7" y2="324.9"/>
                            <line class="st0" x1="485.4" y1="318.2" x2="485.4" y2="331.5"/>
                        </g>
                        <g>
                            <line class="st0" x1="226.5" y1="396.7" x2="239.1" y2="396.7"/>
                            <line class="st0" x1="232.8" y1="390" x2="232.8" y2="403.3"/>
                        </g>
                        <ellipse class="st0" cx="179.4" cy="395.6" rx="7.2" ry="7.6"/>
                        <line class="st0" x1="131.9" y1="232.5" x2="178.4" y2="232.5"/>
                        <g>
                            <g>
                                <polygon class=" corLabelProdutos"
                                         points="1.1,249.4 -19.3,367.7 452.7,395.6 485.4,239.1 			"/>
                            </g>
                            <g>
                                <image style="overflow:visible;" width="513" height="171"
                                       xlink:href="{{ asset('img/svg/portfolio-v2/E003A7B2.png') }}"
                                       transform="matrix(1 0 0 1 -13 242)">
                                </image>
                            </g>
                        </g>
                        <polygon class="st0" points="-31.9,388.6 -15.7,396.6 -17.3,377.8 	"/>
                        <line class="st0" x1="352.7" y1="228" x2="388.6" y2="228"/>
                        <line class="st0" x1="311.2" y1="216.4" x2="357.6" y2="216.4"/>
                    </g>
                    <g>
                        <g>
                            <g>
                                <path class="stProd2" d="M73.8,351.7h-58c-0.9,0-1.6-0.7-1.6-1.6v-58c0-0.9,0.7-1.6,1.6-1.6s1.6,0.7,1.6,1.6v56.4h54.8v-56.4
				c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6v58C75.4,351,74.7,351.7,73.8,351.7z"/>
                            </g>
                            <g>
                                <path class="stProd2" d="M73.8,351.7c-0.4,0-0.9-0.2-1.2-0.5c-0.6-0.7-0.5-1.7,0.1-2.3l15.6-14v-57.3h-57L17,293.2
				c-0.6,0.7-1.6,0.7-2.3,0.1c-0.7-0.6-0.7-1.6-0.1-2.3l14.8-16.1c0.3-0.3,0.7-0.5,1.2-0.5h59.3c0.9,0,1.6,0.7,1.6,1.6v59.7
				c0,0.5-0.2,0.9-0.5,1.2l-16.1,14.4C74.6,351.6,74.2,351.7,73.8,351.7z"/>
                            </g>
                            <g>
                                <path class="stProd2" d="M73.8,293.7c-0.4,0-0.8-0.2-1.1-0.5c-0.6-0.6-0.6-1.6,0-2.3l16.1-16.1c0.6-0.6,1.6-0.6,2.3,0
				c0.6,0.6,0.6,1.6,0,2.3L75,293.2C74.7,293.5,74.2,293.7,73.8,293.7z"/>
                            </g>
                            <g>
                                <path class="stProd2" d="M44.8,293.7c-0.4,0-0.8-0.2-1.1-0.5c-0.6-0.6-0.6-1.6,0-2.3l16.1-16.1c0.6-0.6,1.6-0.6,2.3,0
				c0.6,0.6,0.6,1.6,0,2.3L46,293.2C45.7,293.5,45.2,293.7,44.8,293.7z"/>
                            </g>
                            <g>
                                <path class="stProd2" d="M54.5,308.2H35.2c-0.9,0-1.6-0.7-1.6-1.6s0.7-1.6,1.6-1.6h19.3c0.9,0,1.6,0.7,1.6,1.6S55.4,308.2,54.5,308.2
				z"/>
                            </g>
                        </g>
                        <g>
                            <path class="stProd2" d="M73.8,293.7H16.6c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6h57.2c0.9,0,1.6,0.7,1.6,1.6
			C75.4,293,74.7,293.7,73.8,293.7z"/>
                        </g>
                    </g>
                    <g>
                        <path class="stProd2" d="M110.5,337.8c0-0.2,0-1,0-2.6c0-1.6,0-3,0-4.4c0-2.5,0.1-6.9,0.2-13.4c0.1-6.4,0.2-11.6,0.2-15.4
		c0-4.8-0.1-9.7-0.3-14.8c-0.1-1.1-0.1-1.8-0.1-2c0-1.5,0.3-2.6,0.8-3.3c0.5-0.7,1.4-1.1,2.5-1.2c0,0,0.2,0,0.4,0
		c4.2-0.3,9.2-0.5,14.7-0.5c6.1,0,10.6,1.9,13.5,5.6s4.4,9.5,4.4,17.4c0,7.3-1.6,13.1-4.7,17.5c-3.1,4.4-7.2,6.5-12.4,6.5
		c-0.2,0-0.4,0-0.8,0c-0.4,0-0.7,0-0.8,0c-1.6,0-2.7,0.3-3.3,0.8c-0.6,0.5-0.9,1.5-0.9,2.9c0,2.6,0.1,5.3,0.3,8.1
		c0.1,0.7,0.1,1.1,0.1,1.2c0,1.2-0.2,2-0.7,2.5c-0.5,0.5-1.3,0.8-2.5,0.8c-0.3,0-0.8,0-1.5-0.1c-0.7-0.1-1.3-0.1-1.8-0.1
		c-0.6,0-1.4,0.1-2.5,0.2c-1,0.1-1.8,0.2-2.2,0.2c-0.8,0-1.5-0.2-1.9-0.7c-0.4-0.5-0.6-1.2-0.6-2.3c0-0.5,0-1,0-1.6
		C110.5,338.3,110.5,337.9,110.5,337.8z M123.3,298.5c0,3.2,0,6.1,0.1,8.6s0.2,4,0.3,4.7c0.1,0.5,0.5,0.9,1.1,1.3
		c0.6,0.3,1.4,0.5,2.3,0.5c1.9,0,3.2-0.7,3.9-2s1.1-3.8,1.1-7.5c0-4-0.4-6.7-1.1-8.3c-0.8-1.6-2.1-2.4-3.9-2.4
		c-1.3,0-2.3,0.4-2.9,1.3C123.6,295.3,123.3,296.7,123.3,298.5z"/>
                        <path class="stProd2" d="M152.9,337.7V286c0-2.3,0.3-3.7,1-4.4c0.7-0.7,1.9-1,3.8-1c1,0,2.2,0,3.7,0.1c1.5,0.1,2.5,0.1,3.1,0.1
		c0.8,0,2.3,0,4.4-0.1c2.1-0.1,3.8-0.1,5.1-0.1c5.7,0,9.8,1.6,12.2,4.9c2.4,3.3,3.6,8.8,3.6,16.6c0,6-0.5,10.4-1.5,13.3
		c-1,2.9-2.7,4.9-5,6.1l7.9,18.1c0.1,0.3,0.2,0.6,0.3,0.9c0.1,0.3,0.1,0.5,0.1,0.7c0,0.7-0.3,1.3-0.8,1.8c-0.5,0.4-1.3,0.7-2.2,0.7
		c-0.2,0-0.5,0-0.9-0.1s-0.8-0.1-1-0.1h-7.4c-1.7,0-2.9-1.1-3.7-3.3c-0.2-0.6-0.4-1-0.5-1.4l-6.7-17.3h-1.5v18.4
		c0,1.2-0.2,2.2-0.7,2.7c-0.5,0.6-1.2,0.8-2.2,0.8h-7.7c-1.4,0-2.3-0.3-2.7-0.9C153.1,341.8,152.9,340.2,152.9,337.7z M166.7,304.6
		c0,3.3,0.3,5.4,0.9,6.1s1.7,1.1,3.3,1.1c1.5,0,2.6-0.5,3.5-1.6c0.9-1.1,1.3-2.5,1.3-4.2c0-5.4-0.4-8.7-1.1-10.1
		c-0.8-1.4-2.1-2.1-4.2-2.1c-1.3,0-2.3,0.4-2.9,1.2c-0.7,0.8-1,1.9-1,3.5c0,0.3,0,1.2,0.1,2.5C166.6,302.3,166.7,303.5,166.7,304.6z
		"/>
                        <path class="stProd2" d="M196.5,312.6c0-7.4,0.3-12.7,0.8-15.9s1.4-6,2.6-8.3c1.5-2.9,3.7-5.1,6.7-6.6c3-1.5,6.6-2.2,10.9-2.2
		c6.4,0,11.1,1.9,14.1,5.8c3,3.9,4.4,10.1,4.4,18.7v2.8c0,8.9-0.2,15-0.5,18.5c-0.4,3.5-1,6.3-1.8,8.5c-1.4,3.4-3.7,6-6.9,7.8
		c-3.2,1.8-7.1,2.7-11.7,2.7c-6.7,0-11.5-2.4-14.4-7.1C197.9,332.7,196.5,324.4,196.5,312.6z M212,321c0,3.2,0.3,5.4,0.8,6.6
		c0.6,1.2,1.6,1.7,3,1.7c1.8,0,3-0.7,3.7-2.2c0.7-1.4,1-5.2,1-11.4v-1.1v-13.6c0-2.1-0.4-3.7-1.1-4.9c-0.7-1.2-1.8-1.8-3.1-1.8
		c-1.6,0-2.7,0.7-3.4,2c-0.7,1.4-1,3.8-1,7.3V321z"/>
                        <path class="stProd2" d="M257.9,280.8h0.3c6.9,0,11.7,2.6,14.6,7.7c2.9,5.1,4.3,14.2,4.3,27.3c0,9.4-1.3,16.4-3.9,20.9
		c-2.6,4.5-6.7,6.8-12.1,6.8c-0.4,0-0.9,0-1.6-0.1s-1-0.1-1.2-0.1l-5.7,0.1c-0.1,0-0.4,0-0.8,0c-2.2,0.1-4.3,0.1-6.5,0.1
		c-1.8,0-2.9-0.4-3.5-1.1c-0.6-0.8-0.8-3-0.8-6.7V335c0-0.2,0-1,0-2.3c0.2-7.7,0.3-15.5,0.3-23.4c0-7.9-0.1-15.5-0.4-22.9
		c-0.1-1.1-0.1-1.7-0.1-1.8c0-1.4,0.4-2.3,1.1-3c0.8-0.6,2-0.9,3.7-0.9c0.2,0,0.9,0,2.2,0.1c1.3,0,2.5,0.1,3.6,0.1L257.9,280.8z
		 M254.6,324.6c0,0.2,0,0.4,0,0.8c0,0.4,0,0.7,0,0.9c0,1.5,0.2,2.5,0.7,3.1s1.2,0.9,2.4,0.9c1.8,0,2.9-0.7,3.6-2.2s0.9-4.9,0.9-10.4
		v-5.4c0-7.8-0.3-12.7-1-14.6c-0.7-1.9-2-2.8-4-2.8c-0.9,0-1.6,0.2-2,0.7c-0.4,0.5-0.6,1.3-0.6,2.4c0,1,0,2.3,0.1,3.7
		c0.1,1.4,0.1,2.3,0.1,2.6L254.6,324.6z"/>
                        <path class="stProd2" d="M282,320.5v-33.6c0-2.7,0.2-4.4,0.7-5.1c0.5-0.7,1.3-1.1,2.6-1.1h7.1c1.4,0,2.4,0.3,3,0.8
		c0.5,0.6,0.8,1.9,0.8,4v38.2c0,2.1,0.4,3.6,1.1,4.5c0.8,1,1.9,1.4,3.5,1.4c1.6,0,2.7-0.4,3.5-1.2c0.8-0.8,1.2-2,1.2-3.6v-39.3
		c0-1.9,0.3-3.2,0.9-3.9c0.6-0.7,1.7-1.1,3.3-1.1h6.8c1.1,0,1.9,0.4,2.4,1.1c0.5,0.7,0.7,1.9,0.7,3.5v37.9c0,7.4-1.6,12.7-4.8,16.1
		c-3.2,3.4-8.3,5.1-15.3,5.1c-3.3,0-6.2-0.5-8.5-1.5s-4.3-2.5-5.7-4.5c-1.2-1.6-2-3.6-2.5-6C282.3,329.9,282,326,282,320.5z"/>
                        <path class="stProd2" d="M345.8,298.7l0.1,35.3c0,1,0,2.2,0.1,3.4s0.1,2,0.1,2.3c0,1.3-0.2,2.2-0.7,2.8c-0.5,0.6-1.3,0.8-2.4,0.8
		c-0.1,0-0.4,0-0.8,0c-0.5,0-0.9,0-1.3,0c-0.4,0-1.2,0-2.5,0.1c-1.2,0.1-2.2,0.1-3,0.1c-1.4,0-2.4-0.3-3-0.8
		c-0.6-0.5-0.9-1.4-0.9-2.7c0-0.5,0-1.2,0.1-2.3c0.1-1,0.1-1.8,0.1-2.3v-22.6c0-0.5,0-1.2-0.1-2.1c-0.1-1-0.1-1.7-0.1-2.3
		c0-0.2,0-0.8,0-1.7c0.1-3.4,0.2-6.7,0.2-9.8c0-0.6,0-1-0.1-1.2c-0.1-0.2-0.3-0.3-0.5-0.4c-0.7-0.2-1.8-0.3-3.3-0.3
		c-1.6,0-2.7-0.2-3.5-0.5c-0.6-0.3-1-0.9-1.2-2c-0.2-1.1-0.3-3.4-0.3-7.1c0-1.6,0.3-2.7,1-3.5s1.7-1.1,3.1-1.1
		c3.9,0,7.7-0.1,11.5-0.2c0.7,0,1,0,1.1,0c0.9,0,2.1,0,3.6,0.1s2.5,0.1,3,0.1c0.6,0,1.4,0,2.4-0.1c1-0.1,1.8-0.1,2.3-0.1
		c1.7,0,2.8,0.3,3.2,0.8s0.7,1.7,0.7,3.5v1c0,4-0.2,6.5-0.7,7.5c-0.4,1-1.2,1.5-2.4,1.5h-2.9c-1.1,0-1.8,0.1-2.3,0.4
		c-0.4,0.3-0.7,0.9-0.7,1.7v0.8V298.7z"/>
                        <path class="stProd2" d="M359,312.6c0-7.4,0.3-12.7,0.8-15.9s1.4-6,2.6-8.3c1.5-2.9,3.7-5.1,6.7-6.6c3-1.5,6.6-2.2,10.9-2.2
		c6.4,0,11.1,1.9,14.1,5.8c3,3.9,4.4,10.1,4.4,18.7v2.8c0,8.9-0.2,15-0.5,18.5c-0.4,3.5-1,6.3-1.8,8.5c-1.4,3.4-3.7,6-6.9,7.8
		c-3.2,1.8-7.1,2.7-11.7,2.7c-6.7,0-11.5-2.4-14.4-7.1S359,324.4,359,312.6z M374.5,321c0,3.2,0.3,5.4,0.8,6.6
		c0.6,1.2,1.6,1.7,3,1.7c1.8,0,3-0.7,3.7-2.2c0.7-1.4,1-5.2,1-11.4v-1.1v-13.6c0-2.1-0.4-3.7-1.1-4.9s-1.8-1.8-3.1-1.8
		c-1.6,0-2.7,0.7-3.4,2s-1,3.8-1,7.3V321z"/>
                        <path class="stProd2" d="M403.6,338.3l-0.1-6.6v-0.4c0-1.6,0.3-2.7,0.9-3.4c0.6-0.7,1.6-1,3-1c0.3,0,1.2,0.4,2.7,1.1
		c1.6,0.7,3.2,1.1,5,1.1c1.6,0,2.7-0.3,3.4-0.9c0.7-0.6,1-1.6,1-2.9c0-2-1.8-4.4-5.3-7.5c-1.5-1.3-2.6-2.3-3.4-3.1
		c-2.6-2.5-4.4-5-5.6-7.6c-1.1-2.6-1.7-5.6-1.7-8.9c0-5.9,1.6-10.3,4.9-13.2c3.3-3,8.1-4.4,14.7-4.4c4,0,6.5,0.3,7.5,0.8
		c1,0.5,1.5,2.1,1.5,4.8v6.4c0,1.8-0.2,3-0.6,3.5c-0.4,0.5-1.2,0.8-2.4,0.8c-0.7,0-1.8-0.2-3.2-0.6c-1.4-0.4-2.5-0.6-3.2-0.6
		c-1.3,0-2.3,0.3-3,0.9s-1,1.5-1,2.6c0,1.5,1.9,4.1,5.7,7.6c1.9,1.8,3.4,3.2,4.5,4.3c2.2,2.2,3.7,4.3,4.6,6.5c0.9,2.2,1.4,4.9,1.4,8
		c0,6.5-1.5,11.2-4.5,14.3c-3,3.1-7.7,4.6-14,4.6c-2.4,0-4.6-0.2-6.6-0.5s-3.6-0.7-4.6-1.3c-0.6-0.3-1.1-0.7-1.3-1.2
		c-0.2-0.5-0.4-1.3-0.4-2.5V338.3z"/>
                    </g>
</svg>


                <p class="lead lead-descricao-ofertas" id="lead-descricao-produtos"
                   data-izimodal-open="#descricaoProdutos" data-izimodal-transitionin="fadeInDown">
                    @if($padrao->count() != 0)
                        @if($padrao->txtProduto == null || $padrao->txtProduto == '')
                            Atraia mais clientes usando um texto convicente, demonstre e explique o que você está
                            ofertando em poucas palavas.
                            Seja diferente, seja <b style="font-weight: bold;">{{ $info->nome }}!<i
                                        class="fa fa-smile"></i></b>
                        @else
                            {{ $padrao->txtProduto }}
                        @endif
                    @else
                        Crie o seu padrão antes de começar a editar!
                    @endif

                </p>
            </div>
        </div>
    </div>
</div>

<div class="linha-produtos">
    <img src="{{ asset('img/svg/portfolio-v2/fundo-produtos.svg') }}" alt="">

    <div class="container">

        <div class="row">
            @if($padrao->count() != 0)

                <div class="col-sm-8">
                    <div id="coolProdutos" role="tablist" aria-multiselectable="true"
                         style="margin-top: -100px;margin-bottom: 20px">
                        <div class="card" style="box-shadow: none">
                            <div class="card-header" role="tab" id="section1HeaderId">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#coolProdutos" href="#sectionProdutos"
                                       aria-expanded="true" aria-controls="sectionProdutos">
                                        <i data-feather="grid"></i> Adicionar produto
                                    </a>
                                </h5>
                            </div>
                            <div id="sectionProdutos" class="collapse in" role="tabpanel"
                                 aria-labelledby="section1HeaderId">
                                <div class="card-block">
                                    <div class="row"
                                         style="background-color: #fff;color: #444;margin-bottom: 10px;padding: 10px;border-radius: 10px">
                                        <div class="col-12" align="center">
                                            <h2><i data-feather="image"></i> Inserir Produtos</h2>
                                        </div>

                                        <div class="col-sm-6">
                                            <p class="lead">Aviso importante!</p>
                                            <p>
                                                Após adicionar um produto os exemplos abaixo irão sumir. Você pode
                                                adicionar
                                                no
                                                máximo <b>4
                                                    Ofertas</b>.
                                            </p>

                                            <p class="lead">
                                                * O Portal Formosa usa um padrão de imagens para não afetar no
                                                carregamento
                                                da
                                                página. <br>
                                                Utilize imagens no tamanho <b>400px</b> de <b>altura</b> e <b>300px</b>
                                                de
                                                <b>largua</b> com o <i>
                                                    máximo de 200 kB</i>.
                                                Imagens com tamanhos e dimensões <b class="text-danger">maiores</b> que
                                                essas
                                                poderão afetar no <b
                                                        class="text-info">tempo de carregamento da página</b>, fique
                                                atento!
                                                <br><br>
                                                <i class="text-info"> <i data-feather="info"></i> O Portal Formosa não
                                                    se
                                                    responsabiliza por imagens
                                                    fora dos padrões.</i>
                                            </p>
                                        </div>
                                        <div class="col-sm-6" style="padding-top: 10px">
                                            <form action="{{ route('salvarItem') }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="empresa" value="{{ $info->id }}">
                                                <input type="hidden" name="tipo" value="1">
                                                <div class="form-group">
                                                    <label><i data-feather="airplay"></i> Imagem</label>
                                                    <br>
                                                    <small class="text-danger">
                                                        Tamanho: 400x300
                                                    </small>
                                                    <input type="file" name="img" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><i data-feather="edit-3"></i> Escreva o nome do
                                                        produto</label>
                                                    <input type="text" name="nome" id="nomeProd" class="form-control"
                                                           placeholder=" Nome do produto"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label><i data-feather="layers"></i> Descreva o produto</label>
                                                    <textarea name="descricao" id="descProd" style="resize: none"
                                                              rows="5"
                                                              class="form-control"
                                                              placeholder=" Fale um pouco sobre o produto"
                                                              required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><i data-feather="dollar-sign"></i> Preço (Opcional)</label>
                                                    <input type="number" id="precoProd" class="form-control"
                                                           name="preco"
                                                           placeholder=" R$ 0,00">
                                                </div>
                                                <button class="btn btn-success btn-block" type="submit">
                                                    <i data-feather="save"></i> Salvar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4" style="margin-bottom: 20px;">
                    <div id="coresFundo" role="tablist" aria-multiselectable="true">
                        <div class="card" style="box-shadow: none">
                            <div class="card-header" role="tab" id="secaocoresProdutos">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#coresFundo" href="#secaoContentProdutos"
                                       aria-expanded="true" aria-controls="secaoContentProdutos">
                                        <i data-feather="droplet"></i> Mudar cores
                                    </a>
                                </h5>
                            </div>
                            <div id="secaoContentProdutos" class="collapse in" role="tabpanel"
                                 aria-labelledby="secaocoresProdutos">
                                <div class="card-block" style="color: #444;padding: 10px">
                                    <form action="{{ route('mudarCores') }}" method="post">
                                        @csrf
                                        <p><i data-feather="corner-left-down"></i> Alterar cor de <b
                                                    class="text-danger">fundo</b> do banner</p>
                                        <input type="hidden" name="portfolio" value="{{ $padrao->id }}">
                                        <input type="hidden" name="code" value="3">

                                        <div id="pickerFundoProdutos" class="input-group colorpicker-component"
                                             title="Alterar cor da barra lateral">
                                            <input type="hidden" class="corFrenteProdutos" name="cor"
                                                   aria-describedby="basic-addon1" value="{{ $corFundoProduto }}"
                                                   id="inputBarra">
                                            <span class="input-group-addon" id="basic-addon1"
                                                  style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
                                        <b> Clique para alterar</b>
                                    </span>
                                        </div>
                                        <button class="btn btn-success btn-block">
                                            <i data-feather="save"></i>
                                            Salvar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="row">
            @if($produtos->count() == 0)
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px" id="linhaProdutos">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                    <div class="card card-ofertas">
                        <img class="card-img-top" src="https://picsum.photos/400/300?blur" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title titulo-card-produto" align="center">PRODUTO</h3>
                            <p class="card-text lead lead-card-produto">Some quick example text to build on the card
                                title
                                and
                                make up the bulk of the card's content.</p>
                            <p align="center">
                                <b class="preco-produto">
                                    R$ 10,00
                                </b>
                            </p>
                        </div>
                    </div>
                </div>

            @else

                @foreach($produtos as $produto)
                    <div class="col-12 col-sm-3" style="padding: 0 7px;margin-bottom: 30px">
                        <div class="card card-ofertas">
                            <img class="card-img-top" src="{{ $produto->link }}" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title titulo-card-produto" align="center">
                                    {{ $produto->nome }}
                                </h3>
                                <p class="card-text lead lead-card-produto">
                                    {{ $produto->desc }}
                                </p>

                                @if($produto->preco != null)
                                    <p align="center">
                                        <b class="preco-produto">
                                            R$ 10,00
                                        </b>
                                    </p>
                                @endif

                                <div class="row">
                                    <div class="col-12" align="center">
                                        <form action="{{ route('removeFile') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="local" value="{{ $produto->link }}">
                                            <input type="hidden" name="id" value="{{ $produto->id }}">
                                            <button class="btn btn-outline-danger">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="container content-sobre" id="sobre">
    <div class="row">
        <div class="col-sm">
            <h3 class="sobre-title"><i data-feather="message-circle"></i> Sobre</h3>
            <p class="sobre-text" id="sobreText" data-izimodal-open="#sobreEmpresa"
               data-izimodal-transitionin="fadeInDown">
                @if($padrao->count() != 0)
                    @if($padrao->sobre == null || $padrao->sobre == '')
                        Hummm... Por enquanto não temos nada por aqui.
                        Que tal você clicar no texto para você alterar?
                        <br><br>
                        <b>Texto exemplo:</b>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, ipsam, itaque. Accusamus
                        adipisci animi blanditiis commodi culpa ducimus eveniet fuga id nihil officia placeat, provident
                        repellat saepe velit voluptatem voluptates.
                    @else
                        {{ $padrao->sobre }}
                    @endif
                @else
                    Crie o seu padrão antes de começar a editar!
                @endif
            </p>
        </div>
        <div class="col-sm">
            <h3 class="ache-nos-title">
                <i data-feather="map-pin"></i> Ache-nos
            </h3>
            <p class="lead">
            @if($padrao->count() != 0)
                @if($padrao->mapa != null)
                    {!! $padrao->mapa !!}
                @else
                    @if($quantidadeMapa != 0)
                        <div class="alert alert-info" role="alert">
                            <strong>Pedido efetuado!</strong> Você já fez a solicitação para inserir o mapa, aguarde
                            logo
                            nos responderemos.
                        </div>

                        <form action="{{ route('atualizarMapa') }}" method="post">
                            @csrf
                            <input type="hidden" name="empresa" value="{{ $padrao->id }}">
                            <textarea name="codigo" class="form-control" style="resize: none" required rows="10"
                                      placeholder=" Código HTML"></textarea>
                            <button type="submit" class="btn btn-success btn-block">
                                <i data-feather="save"></i> salvar
                            </button>
                        </form>
                    @endif
                    Você ainda não tem nenhum mapa para mostrar, deseja fazer a solicitação de um?
                    <form action="{{ route('solicitarMapa') }}" method="post">
                        @csrf
                        <input type="hidden" name="empresa" value="{{ $info->nome }}">
                        <input type="hidden" name="assunto" value="mapa">
                        <button type="submit" class="btn btn-success">
                            <i data-feather="thumbs-up"></i> Sim
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i data-feather="thumbs-down"></i> Não
                        </button>
                    </form>
                @endif
            @endif
            <b>Mapa exemplo:</b>
            <iframe id="mapaFrame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61501.78809676773!2d-47.35296059916542!3d-15.545539986696996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9350a2912067fad5%3A0x6a35994b2edf538b!2sFormosa%2C+GO!5e0!3m2!1spt-BR!2sbr!4v1527705311029"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </p>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalActions" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId" style="color: #000">Ações do portfólio</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <p>As redes sociais só irão aparecer após você adicionar uma.</p>
                        <a href="{{ route('verEmpresaUsuario', ['id' => $info->id]) }}" class="btn btn-info"
                           style="border-radius: 0"><i data-feather="package"></i> Adicionar rede social</a>
                        <button data-dismiss="modal" onclick="driver.start();" class="btn btn-info"
                                style="border-radius: 0"><i data-feather="shuffle"></i> Ver tutorial novamente
                        </button>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                @if($padrao->count() != 0)
                    <form action="javascript:salvarDadosAjax(`formPublicar`)" id="formPublicar" data-input="publicar"
                          data-code="9"
                          data-empresa="{{ $padrao->id }}" data-token="{{ csrf_token() }}"
                          data-rota="{{ route('alterarAjax') }}">

                        <input type="hidden" id="publicar" value="1">
                        <button class="btn btn-success" type="submit"><i data-feather="send"></i> Publicar portfólio
                        </button>
                    </form>
                @else
                    Crie um padrão.
                @endif

            </div>
        </div>
    </div>
</div>


@section('scripts-src')
    <script src="{{ asset('js/vendor/driver/driver.min.js') }}"></script>
@endsection