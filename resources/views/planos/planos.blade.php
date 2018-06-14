@extends('layouts.default.v2.noticias')
@section('titlePage', 'Divulgar minha empresa no ')
@section('container')

    <section class="container-att">
        <div class="row">
            <div class="container" align="center">
                <div class="descricao">
                    <h1 style="text-transform: uppercase;font-weight: 700">Encontre o plano <span style="color:#ca6362">certo</span>
                        pra você pelo <span style="color: #32a4ff;">menor preço</span>!</h1>
                    <h2 class="lead sub-descricao">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda dicta dolorem ea
                        enim eos excepturi fugit in laudantium maiores mollitia, natus nisi non quasi, quos repellat sed
                        veniam voluptatem.
                    </h2>
                    <p>
                        <a href="{{ route('cadastrarMinhaEmpresa') }}" class="btn btn-gratis">Iniciar grátis</a>
                        <a href="#" class="btn btn-planos" onclick="$('#planosPortalFormosa').animatescroll({scrollSpeed:1000,easing:'easeOutQuad'});">Planos</a>
                    </p>
                </div>
                <br>
                <img src="{{ asset('img/svg/fundo-planos.svg') }}" height="450px" alt="">
            </div>
        </div>
    </section>

    <section class="footer-container">
        <div class="container">
            <p class="text-center" style="color: #444546;">
                <i>Fique online e traga novos clientes para sua empresa! Com o Portal Formosa você consegue se
                    encontrado em qualquer
                    lugar!
                </i>
            </p>
        </div>
    </section>

    <section class="planos" id="planosPortalFormosa">
        <div class="container">
            <div class="row">
                <div class="p-10 col-sm-4">

                    <div class="card-planos plano plano-basico">
                        <header>
                            <figure>
                                <img src="{{ asset('img/svg/planos/basic.svg') }}" class="img-responsive" alt="">
                            </figure>
                        </header>
                        <main>
                            <section class="valor">
                                <h3 align="center">
                                    <b style="font-weight: inherit">R$ 14,99</b>
                                </h3>
                                <div align="center">
                                    <i class="mes">POR MÊS</i>
                                </div>
                            </section>

                            <article class="descricao-ferramentas">
                                <ul class="ferramentas">
                                    <li>
                                        Item 1
                                    </li>
                                    <li>Item 2</li>
                                    <li>Item 3</li>
                                    <li>Item 4</li>
                                    <li class="contratar">

                                        <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
                                            <input type="hidden" name="code" value="B7AD02CF8181D18AA4316FA9DFD331E1" />
                                            <input type="hidden" name="iot" value="button" />
                                            <input type="submit" class="btn btn-contratar" value="Contratar">

                                        </form>
                                    </li>
                                </ul>
                            </article>
                        </main>
                    </div>

                </div>
                <div class="p-10 col-sm-4">
                    <div class="card-planos plano plano-premium">
                        <header>
                            <figure>
                                <img src="{{ asset('img/svg/planos/premium.svg') }}" class="img-responsive" alt="">
                            </figure>
                        </header>
                        <main>
                            <section class="valor">
                                <h3 align="center">
                                    <b style="font-weight: inherit">
                                        R$ 24,99
                                    </b>
                                </h3>
                                <div align="center">
                                    <i class="mes">POR MÊS</i>
                                </div>
                            </section>

                            <article class="descricao-ferramentas">
                                <ul class="ferramentas">
                                    <li>Item 1</li>
                                    <li>Item 2</li>
                                    <li>Item 3</li>
                                    <li>Item 4</li>
                                    <li>Item 5</li>
                                    <li>Item 6</li>
                                    <li class="contratar">
                                        <input type="submit" class="btn btn-contratar" value="Contratar">
                                    </li>
                                </ul>
                            </article>
                        </main>
                    </div>
                </div>

                <div class="p-10 col-sm-4">
                    <div class="card-planos plano plano-business">
                        <header>
                            <figure>
                                <img src="{{ asset('img/svg/planos/business.svg') }}" class="img-responsive" alt="">
                            </figure>
                        </header>
                        <main>
                            <section class="valor">
                                <h3 align="center">
                                    <b style="font-weight: inherit">
                                        R$ 34,99
                                    </b>
                                </h3>
                                <div align="center">
                                    <i class="mes">POR MÊS</i>
                                </div>
                            </section>

                            <article class="descricao-ferramentas">
                                <ul class="ferramentas">
                                    <li>Item 1</li>
                                    <li>Item 2</li>
                                    <li>Item 3</li>
                                    <li>Item 4</li>
                                    <li class="contratar">
                                        <input type="submit" class="btn btn-contratar" value="Contratar">
                                    </li>
                                </ul>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/navbar-nivel-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/planos/planos.min.css') }}">
@endsection

@section('script-src')
    <script src="{{ asset('js/vendor/animatescroll/animatescroll.min.js') }}"></script>
@endsection