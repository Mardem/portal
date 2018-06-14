<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class PortfolioController extends Controller
{
    public function index($link, $id)
    {

        try {
            $checkPlano = \App\Models\Empresa::
            where('link', '=', $link)
                ->where('cpf', '=', \Auth::user()->cpf)
                ->where('plano', '=', 3)
                ->get()[0];
            $checkPadrao = \App\Models\Portfolio::where('empresa', $checkPlano->id)->get()[0];
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Esta empresa não está vinculado ao seu CPF ou não possui um plano de Portfolio! Verifique com os administradores.' . $e->getMessage());
        }

        $nome = explode(' ', \Auth::user()->name);
        $primeiroNome = $nome[0];

        $ofertas = \App\Models\ProdutosPortfolio::where('empresa', $checkPlano->id)->where('tipo', 0)->get();
        $produtos = \App\Models\ProdutosPortfolio::where('empresa', $checkPlano->id)->where('tipo', 1)->get();
        $map = \App\Models\Notification::where('remetente', $checkPlano->nome)->where('assunto', 'Adicionar mapa no portfolio')->count();

        return view('portfolio.templates.v2')->with(['nome' => $primeiroNome, 'padrao' => $checkPadrao, 'info' => $checkPlano, 'ofertas' => $ofertas, 'produtos' => $produtos, 'quantidadeMapa' => $map]);
    }

    public function salvarCoresPortfolio(Request $request)
    {
        try {
            $cor = new \App\Models\Portfolio;
            $cor->fundoCor = $request->principal;
            $cor->empresa = $request->empresa;
            $cor->save();


            return redirect()->back()->with('success', 'Padrão criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o padrão: ' . $e->getMessage());
        }


    }

    public function salvarItem(Request $request)
    {
        switch ($request->tipo) {
            case 0:
                try {
                    $file = $request->file('img');
                    $local = 'img/portfolio-images/oferta';
                    $name = 'imagem-oferta-' . date('Y-m-d', time()) . '-hora-' . date('H-i-s', time()) . '-pf.' . $file->getClientOriginalExtension();
                    $file->move($local, $name);
                    $imagemFinal = "/" . $local . "/" . $name;

                    $salvar = new \App\Models\ProdutosPortfolio();
                    $salvar->nome = $request->nome;
                    $salvar->desc = $request->descricao;
                    $salvar->preco = $request->preco;
                    $salvar->local = 'portfolio-oferta';
                    $salvar->link = $imagemFinal;
                    $salvar->tipo = 0;
                    $salvar->empresa = $request->empresa;
                    $salvar->save();

                    return redirect()->back()->with('success', 'Oferta cadastrada com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Erro ao cadastrar a oferta: ' . $e->getMessage());

                }
                break;
            case 1:
                try {
                    $file = $request->file('img');
                    $local = 'img/portfolio-images/produtos';
                    $name = 'imagem-produto-' . date('Y-m-d', time()) . '-hora-' . date('H-i-s', time()) . '-pf.' . $file->getClientOriginalExtension();
                    $file->move($local, $name);
                    $imagemFinal = "/" . $local . "/" . $name;

                    $salvar = new \App\Models\ProdutosPortfolio();
                    $salvar->nome = $request->nome;
                    $salvar->desc = $request->descricao;
                    $salvar->preco = $request->preco;
                    $salvar->local = 'portfolio-produto';
                    $salvar->link = $imagemFinal;
                    $salvar->tipo = 1;
                    $salvar->empresa = $request->empresa;
                    $salvar->save();

                    return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Erro ao cadastrar a produto: ' . $e->getMessage());
                }
                break;
        }
    }

    public function removeFile(Request $request)
    {
        try {
            unlink(substr($request->local, 1));
            $r = \App\Models\ProdutosPortfolio::find($request->id);
            $r->delete();
            return redirect()->back()->with('success', 'Item removido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao remover item: ' . $e->getMessage());
        }
    }

    public function alterarDadosAjax(Request $request)
    {
        switch ($request->opt) {
            case 0:
                try {
                    $d = \App\Models\Portfolio::find($request->id);
                    $d->subtitulo = $request->data;
                    $d->save();
                    return ['title' => 'Parabéns!', 'type' => 'success', 'data' => $request->data, 'msg' => 'A descrição foi atualizada com sucesso!'];
                } catch (\Exception $e) {
                    return ['title' => 'Erro!', 'type' => 'error', 'msg' => 'Ocorreu um erro ao atualizar ' . $e->getMessage()];
                }
                break;

            case 1:
                try {
                    $d = \App\Models\Portfolio::find($request->id);
                    $d->txtOferta = $request->data;
                    $d->save();
                    return ['title' => 'Parabéns!', 'type' => 'success', 'data' => $request->data, 'msg' => 'A descrição foi atualizada com sucesso!'];
                } catch (\Exception $e) {
                    return ['title' => 'Erro!', 'type' => 'error', 'msg' => 'Ocorreu um erro ao atualizar ' . $e->getMessage()];
                }
                break;

            case 2:
                try {
                    $d = \App\Models\Portfolio::find($request->id);
                    $d->txtProduto = $request->data;
                    $d->save();
                    return ['title' => 'Parabéns!', 'type' => 'success', 'data' => $request->data, 'msg' => 'A descrição foi atualizada com sucesso!'];
                } catch (\Exception $e) {
                    return ['title' => 'Erro!', 'type' => 'error', 'msg' => 'Ocorreu um erro ao atualizar ' . $e->getMessage()];
                }
                break;
            case 3:
                try {
                    $d = \App\Models\Portfolio::find($request->id);
                    $d->sobre = $request->data;
                    $d->save();
                    return ['title' => 'Parabéns!', 'type' => 'success', 'data' => $request->data, 'msg' => 'A descrição foi atualizada com sucesso!'];
                } catch (\Exception $e) {
                    return ['title' => 'Erro!', 'type' => 'error', 'msg' => 'Ocorreu um erro ao atualizar ' . $e->getMessage()];
                }
                break;
            case 9:
                try {
                    $d = \App\Models\Portfolio::find($request->id);
                    $d->publicar = $request->data;
                    $d->save();
                    return ['title' => 'Publicado', 'type' => 'success', 'data' => $request->data, 'msg' => 'Portfólio publicado com sucesso!'];
                } catch (\Exception $e) {
                    return ['title' => 'Erro!', 'type' => 'error', 'msg' => 'Ocorreu um erro ao publicar ' . $e->getMessage()];
                }
                break;
        }
    }

    public function mudarCores(Request $request)
    {
        switch ($request->code) {
            case 0:
                try {
                    $u = \App\Models\Portfolio::find($request->portfolio);
                    $u->fundoCor = $request->principal;
                    $u->save();
                    return redirect()->back()->with('success', 'Cor alterada com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a cor: ' . $e->getMessage());
                }
                break;
            case 1:
                try {
                    $u = \App\Models\Portfolio::find($request->portfolio);
                    $u->fundoOferta = $request->cor;
                    $u->save();
                    return redirect()->back()->with('success', 'Cor alterada com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a cor: ' . $e->getMessage());
                }
                break;
            case 2:
                try {
                    $u = \App\Models\Portfolio::find($request->portfolio);
                    $u->frenteOferta = $request->cor;
                    $u->save();
                    return redirect()->back()->with('success', 'Cor alterada com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a cor: ' . $e->getMessage());
                }
                break;
            case 3:
                try {
                    $u = \App\Models\Portfolio::find($request->portfolio);
                    $u->fundoProduto = $request->cor;
                    $u->save();
                    return redirect()->back()->with('success', 'Cor alterada com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a cor: ' . $e->getMessage());
                }
                break;
            case 4:
                try {
                    $u = \App\Models\Portfolio::find($request->portfolio);
                    $u->fundoProduto = '';
                    $u->frenteOferta = '';
                    $u->fundoOferta = '';
                    $u->save();
                    return redirect()->back()->with('success', 'Cores resetadas com sucesso!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar a cor: ' . $e->getMessage());
                }
                break;
        }
    }

    public function solicitarMapa(Request $request)
    {
        try {
            $n = new \App\Models\Notification;
            $n->finalizado = 0;
            $n->visto = 0;
            $n->assunto = "Adicionar mapa no portfolio";
            $n->remetente = $request->empresa;
            $n->texto = '* Mensagem Automática: Usuário necessita a inserção do mapa da empresa no portfolio.';
            $n->icone = 'fa fa-map';
            $n->save();

            return redirect()->back()->with('success', 'Sua solicitação foi enviada com sucesso! Logo mais responderemos.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro na solicitação: ' . $e->getMessage());
        }
    }

    public function atualizarMapa(Request $request)
    {
        try {
            $m = \App\Models\Portfolio::find($request->empresa);
            $m->mapa = $request->codigo;
            $m->save();

            return redirect()->back()->with('success', 'Mapa adicionado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao inserir o mapa: ' . $e->getMessage());
        }
    }
}
