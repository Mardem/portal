<?php

namespace App\Http\Controllers\Aberto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresasController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 20;
        $order = $request->all()['order'] ?? null;
        if ($order !== null) {
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'desc';
        $pesquisa = $request->all()['pesquisa'] ?? null;
        if ($pesquisa) {
            $pesquisa = explode(',', $pesquisa);
            $pesquisa[0] = '%' . $pesquisa[0] . '%';
        }

        $categoria = $request->all()['categoria'] ?? [];
        if ($categoria) {
            $categoria = explode(',', $categoria);
        }

        $bairro = $request->all()['bairro'] ?? [];
        $categorias = \App\Models\Categoria::where('local', '=', 0)->get();
        $bairros = \App\Models\Bairro::all();

        $result = \App\Models\Empresa::orderBy($order[0], $order[1])
            ->where(function ($query) use ($pesquisa) {
                if ($pesquisa) {
                    return $query->where('nome', 'like', $pesquisa[0]);
                }
                return $query;
            })
            ->where(function ($query) use ($categoria) {
                if ($categoria) {
                    return $query->where('categoria', '=', $categoria[0]);
                }
            })
            ->where(function ($query) use ($bairro) {
                if ($bairro) {
                    return $query->where('bairro', 'like', $bairro);
                }
            })->
            where('revisado', 1)->paginate($limit);

        $outros = \App\Models\Empresa::inRandomOrder()->where('revisado', 1)->limit(6)->get();
        $pesquisado = $request->all()['pesquisa'] ?? null;

        $categoriaSelecionada = $request->all()['categoria'] ?? 'Nenhuma';
        $bairroSelecionado = $request->all()['bairro'] ?? 'Nenhum';

        return view('aberto.empresas', compact('result', 'categorias', 'pesquisado', 'autoresCadastrado',
            'outros', 'categoriaSelecionada', 'bairroSelecionado', 'bairros'));
    }

    public function cadastrarMinhaEmpresa()
    {
        return view('aberto.cadastrar-empresas');
    }

    public function salvar(Request $request)
    {

        try {
            $e = new \App\Models\Empresa;
            $e->nome = $request->nome;
            $e->endereco = $request->endereco;
            $e->telefone = $request->telefone;
            $e->bairro = $request->bairro;
            $e->numero = $request->numero;
            $e->cidade = $request->cidade;
            $e->categoria = 'x';
            $e->revisado = 0;
            $e->cpf = \Auth::user()->cpf;
            $e->estado = $request->estado;
            $e->plano = 0;
            $e->save();

            session()->flash('success', 'Empresa cadastrada com sucesso! Aguarde a liberação.');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro no cadastro: ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }
}
