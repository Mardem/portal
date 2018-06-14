<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Aberto\HomeController@index')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'can:admin'], 'namespace' => 'Noticias', 'prefix' => 'noticias'], function (){
    Route::get('compor','NoticiasController@compor')->name('comporNoticia');
    Route::get('todas-cadastradas','NoticiasController@allNews')->name('todasNoticias');
    Route::post('salvar-noticia','NoticiasController@save')->name('salvarNoticia');
    Route::post('apagar', 'NoticiasController@delete')->name('apagarNoticia');
    Route::post('cadastro-categoria-noticia', 'NoticiasController@cadastroCategoriaNoticia')->name('cadastroCategoriaNoticia');
});

Route::group(['middleware' => ['auth', 'can:admin'], 'namespace' => 'Notificacoes', 'prefix' => 'notificacoes'], function (){
    Route::get('todas-notificacoes', 'NotificationController@index')->name('notificacoes');
    Route::get('notificacao/{id}', 'NotificationController@view')->name('verNotificacao');
    Route::get('finalizar-notificacao/{id}', 'NotificationController@finish')->name('finalizarNotificacao');
    Route::post('responder-notificacao', 'NotificationController@response')->name('respostaNotificacao');
});

Route::group(['middleware' => ['auth', 'can:admin'], 'namespace' => 'Cadastro', 'prefix' => 'cadastro'], function (){
    Route::get('todos', 'EmpresasController@index')->name('todosCadastros');
    Route::get('nova-empresa', 'EmpresasController@novaEmpresa')->name('cadastroNovaEmpresa');
    Route::post('salvar-empresa', 'EmpresasController@salvar')->name('salvarEmpresa');

    Route::post('cadastro-categoria-empresa', 'EmpresasController@cadastroCategoria')->name('cadastroCategoria');
    Route::get('apagar-categoria/{id}', 'EmpresasController@apagarCategoria')->name('apagarCategoria');

    Route::get('vizualizar-empresa/{id}', 'EmpresasController@ver')->name('verEmpresa');
    Route::post('salvar-imagem-empresa', 'EmpresasController@salvarImagemEmpresa')->name('salvarImagemEmpresa');
    Route::get('apagar-empresa/{id}', 'EmpresasController@deleteEmpresa')->name('apagarEmpresa');

    Route::post('atualizar-dados-empresa', 'EmpresasController@atualizarDados')->name('atualizarDadosEmpresa');
    Route::post('atualizar-plano', 'EmpresasController@atualizarPlano')->name('atualizarPlano');

    Route::post('alterar-status-empresa', 'EmpresasController@alterarStatusEmpresa')->name('alterarStatusEmpresa');

    Route::get('listar-bairros', 'BairrosController@index')->name('verBairros');
    Route::post('salvar-bairro', 'BairrosController@save')->name('salvarBairro');
    Route::get('apagar-bairro/{id}', 'BairrosController@remove')->name('apagarBairro');

    Route::get('todos-eventos', 'EventosController@index')->name('verEventos');
    Route::get('permitir-evento/{id}', 'EventosController@permitir')->name('permitirEvento');

    Route::get('todos-pontos-turisticos', 'TuristicosController@index')->name('verPontosTuristicos');
    Route::get('criar-ponto-turistico', 'TuristicosController@novoPonto')->name('novoPonto');
    Route::post('salvar-ponto-turistico', 'TuristicosController@salvarPonto')->name('salvarPonto');
});

Route::group([['middleware' => 'auth'], 'namespace' => 'Plantao', 'prefix' => 'plantoes'], function () {
    Route::get('plantao', 'PlantaoController@index')->name('todosPlantoes');
    Route::get('criar-plantao', 'PlantaoController@criarPlantao')->name('criarPlantao');
    Route::post('salvar-plantao', 'PlantaoController@salvarPlantao')->name('salvarPlantao');
    Route::get('remover-plantao/{id}', 'PlantaoController@destroy')->name('apagarPlantao');
});

Route::group([['middleware' => 'auth'], 'namespace' => 'Usuarios', 'prefix' => 'usuario'], function () {
    Route::get('dados', 'UsuariosController@index')->name('dadosUsuarios');
    Route::post('atualizar-usuario', 'UsuariosController@updateData')->name('atualizarUsuario');

    Route::get('ver-empresa-usuario/{id}', 'UsuariosController@verEmpresaUsuario')->name('verEmpresaUsuario');
    Route::post('atualizar-dados-empresa-usuario', 'UsuariosController@atualizarDados')->name('atualizarDadosEmpresaUser');
});

Route::group(['middleware' => ['auth', 'can:admin'], 'namespace' => 'Usuarios', 'prefix' => 'usuario'], function (){
    Route::post('pesquisa', 'UsuariosController@pesquisa')->name('pesquisarUsuario');

    Route::post('pesquisa-empresa', 'UsuariosController@pesquisarEmpresa')->name('pesquisarEmpresa');
    Route::get('realizar-vinculo/{idEmpresa}/{idUser}', 'UsuariosController@vincularEmpresa')->name('realizarVinculo');
    Route::get('remover-vinculo/{idEmpresa}/{idUser}', 'UsuariosController@removerVinculo')->name('removerVinculo');
});

Route::group(['middleware' => ['auth', 'can:admin'], 'namespace' => 'Banner', 'prefix' => 'banners'], function (){
    Route::get('todos', 'BannerController@todos')->name('todosBanners');
    Route::get('novo-banner', 'BannerController@criarBanner')->name('criarBanner');
    Route::post('salvar-banner', 'BannerController@salvarBanner')->name('salvarBanner');
    Route::post('apagar-banner', 'BannerController@apagarBanner')->name('apagarBanner');
    Route::get('desativar-banner/{id}/{opt}', 'BannerController@desativarBanner')->name('desativarBanner');
});

Route::group(['namespace' => 'Aberto'], function () {
    Route::get('noticia/{noticia}', 'NoticiasController@mostrarNoticia')->name('lerNoticia');
    Route::get('empresas-online-formosa', 'EmpresasController@index')->name('pesquisaEmpresa');
    Route::get('portfolio/{link}', 'HomeController@portfolio')->name('portfolio');
    Route::get('cadastrar-empresa-online', 'EmpresasController@cadastrarMinhaEmpresa')->name('cadastrarMinhaEmpresa');
    Route::post('save-empresa-online', 'EmpresasController@salvar')->name('salvarEmpresaOnline');

    Route::get('divulgar-novo-evento-online-formosa', 'EventosController@index')->name('novoEvento');
    Route::get('todos-eventos-portal-formosa', 'EventosController@todosEventos')->name('todosEventos');
    Route::post('salvar-novo-evento-formosa', 'EventosController@save')->name('salvarEvento');
    Route::get('evento/{link}', 'EventosController@evento')->name('mostrarEvento');
});

Route::group(['namespace' => 'Aberto', 'prefix' => 'noticias'], function () {
    Route::get('todas-noticias', 'NoticiasController@pesquisaNoticia')->name('todasNoticiasAberta');
});

Route::group(['namespace' => 'Planos', 'prefix' => 'planos'], function () {
    Route::get('', 'PlanosController@index')->name('indexPlanos');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'Portfolio', 'prefix' => 'portfolio'], function () {
    Route::get('{link}/{id}/edit', 'PortfolioController@index')->name('editarPortfolio');
    Route::post('salvar-cores-portfolio', 'PortfolioController@salvarCoresPortfolio')->name('salvarCoresPortfolio');
    Route::post('alterar-dados-ajax', 'PortfolioController@alterarDadosAjax')->name('alterarAjax');
    Route::post('salvar-item-portfolio', 'PortfolioController@salvarItem')->name('salvarItem');
    Route::post('apagar-item-portfolio', 'PortfolioController@removeFile')->name('removeFile');
    Route::post('mudar-cores-portfolio', 'PortfolioController@mudarCores')->name('mudarCores');
    Route::post('solicitar-mapa', 'PortfolioController@solicitarMapa')->name('solicitarMapa');
    Route::post('atualizar-mapa', 'PortfolioController@atualizarMapa')->name('atualizarMapa');
});

Route::group(['namespace' => 'Build', 'prefix' => 'build'], function () {
    Route::get('portfolio-v2', 'BuildController@portfolioV2');
});

Route::get('ajax', 'AjaxController@index')->name('ajax');
Route::get('ajax-autocomplete', 'AjaxController@autocomplete')->name('ajaxAuto');

Route::get('data-json','AjaxController@pesquisaAjax')->name('pesquisaAjax');