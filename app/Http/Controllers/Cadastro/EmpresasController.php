<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index()
    {
        $e = \App\Models\Empresa::orderBy('id', 'desc')->paginate();
        $empresasCount = \App\Models\Empresa::count();
        return view('cadastro.empresas.todos', compact('e', 'empresasCount'));
    }

    public function novaEmpresa()
    {
        $categorias = \App\Models\Categoria::orderBy('id', 'desc')->where('local', '=', 0)->get();
        return view('cadastro.empresas.empresas', compact('categorias'));
    }

    public function salvar(Request $request)
    {
        $validate = $request->validate(
            [
                'nome' => 'required',
                'categoria' => 'required',
                'endereco' => 'required',
                'telefone' => 'required',
            ]
        );

        try {
            $e = new \App\Models\Empresa;
            $e->nome = $request->nome;
            $e->categoria = $request->categoria;
            $e->endereco = $request->endereco;
            $e->telefone = $request->telefone;
            $e->bairro = $request->bairro;
            $e->numero = $request->numero;
            $e->cidade = $request->cidade;
            $e->estado = $request->estado;
            $e->cnpj = $request->cnpj;
            $e->cpf = \Auth::user()->cpf;
            $e->plano = 0;
            $e->save();

            $b = \App\Models\Bairro::where('bairro', $e->bairro)->count();

            if ($b == 0) {
                $bairro = new \App\Models\Bairro;
                $bairro->bairro = $request->bairro;
                $bairro->save();
            }

            session()->flash('success', 'Empresa cadastrada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro no cadastro: ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function cadastroCategoria(Request $request)
    {
        try {
            $c = new \App\Models\Categoria;
            $c->nome = $request->categoria;
            $c->local = 0;
            $c->fundo = '';
            $c->descricao = '';
            $c->save();
            session()->flash('success', 'Categoria cadastrada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro no cadastro: ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function apagarCategoria($id)
    {
        try {
            $c = \App\Models\Categoria::find($id);
            $c->delete();
            session()->flash('success', 'Categoria deletada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro na deleção:  ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function ver($id)
    {
        $e = \App\Models\Empresa::find($id);
        $user = \App\User::find($e->vinculo);

        $categorias = \App\Models\Categoria::where('local', '=', 0)->get();
        return view('cadastro.empresas.ver', compact('e', 'user', 'userC', 'categorias'));
    }

    public function deleteEmpresa($id)
    {
        try {
            $e = \App\Models\Empresa::find($id);
            $e->delete();
            session()->flash('success', 'Empresa deletada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro na deleção:  ' . $e->getMessage()
            );
            return redirect()->back();
        }

    }

    public function atualizarDados(Request $request)
    {
        try {
            if ($request->opt == 0) {
                $e = \App\Models\Empresa::find($request->id);
                $e->cnpj = md5($request->cnpj);
                $e->cnpjView = Crypt::encryptString($request->cnpj);
                $e->save();
                session()->flash('success', 'CNPJ atualizado com sucesso!');
            } else if ($request->opt == 1) {
                $e = \App\Models\Empresa::find($request->id);
                $e->razaoSocial = $request->razao_social;
                $e->save();
                session()->flash('success', 'Razão Social atualizada com sucesso!');
            } else if ($request->opt == 2) {
                $e = \App\Models\Empresa::find($request->id);
                $e->celular = $request->celular;
                $e->save();
                session()->flash('success', 'Ceuluar atualizado com sucesso!');
            } else if ($request->opt == 3) {
                $e = \App\Models\Empresa::find($request->id);
                $e->email = $request->email;
                $e->save();
                session()->flash('success', 'Ceuluar atualizado com sucesso!');
            } else if ($request->opt == 4) {
                $e = \App\Models\Empresa::find($request->id);
                $e->telefone = $request->telefone;
                $e->save();
                session()->flash('success', 'Telefone atualizado com sucesso!');
            } else if ($request->opt == 5) {
                $e = \App\Models\Empresa::find($request->id);
                $e->facebook = $request->facebook;
                $e->save();
                session()->flash('success', 'Facebook atualizado com sucesso!');
            } else if ($request->opt == 6) {
                $e = \App\Models\Empresa::find($request->id);
                $e->linkedin = $request->linkedin;
                $e->save();
                session()->flash('success', 'Linkedin atualizado com sucesso!');
            } else if ($request->opt == 7) {
                $e = \App\Models\Empresa::find($request->id);
                $e->twitter = $request->twitter;
                $e->save();
                session()->flash('success', 'Twitter atualizado com sucesso!');
            } else if ($request->opt == 8) {
                $e = \App\Models\Empresa::find($request->id);
                $e->googlePlus = $request->googlePlus;
                $e->save();
                session()->flash('success', 'Google Plus atualizado com sucesso!');
            } else if ($request->opt == 9) {
                $e = \App\Models\Empresa::find($request->id);
                $e->youtube = $request->youtube;
                $e->save();
                session()->flash('success', 'Youtube atualizado com sucesso!');
            } else if ($request->opt == 10) {
                $e = \App\Models\Empresa::find($request->id);
                $e->link = $request->link . "-formosa";
                $e->save();
                session()->flash('success', 'Link próprio atualizado com sucesso!');
            } else if ($request->opt == 11) {
                $e = \App\Models\Empresa::find($request->id);
                $e->categoria = $request->categoriaCadastro;
                $e->revisado = 1;
                $e->save();
                session()->flash('success', 'Categoria cadastrada!');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro na atualização:  ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function atualizarPlano(Request $request)
    {
        try {
            $e = \App\Models\Empresa::find($request->id);
            $e->plano = $request->plano;
            $e->save();

            session()->flash('success', 'Plano alterado com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro na alteração do plano:  ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function alterarStatusEmpresa(Request $request)
    {
        if ($request->code == 0) {

            try {
                $e = \App\Models\Empresa::find($request->id);
                $e->revisado = $request->code;
                $e->save();
                session()->flash('success', 'Empresa desativada com sucesso!');
            } catch (\Exception $e) {
                session()->flash(
                    'error',
                    'Infelizmente ocorreu um erro na alteração do plano:  ' . $e->getMessage()
                );
            }
            return redirect()->back();

        } elseif ($request->code == 1) {
            try {
                $e = \App\Models\Empresa::find($request->id);
                $e->revisado = $request->code;
                $e->save();
                session()->flash('success', 'Empresa ativada com sucesso!');
            } catch (\Exception $e) {
                session()->flash(
                    'error',
                    'Infelizmente ocorreu um erro na alteração do plano:  ' . $e->getMessage()
                );
            }

            return redirect()->back();
        }
    }

    public function salvarImagemEmpresa(Request $request)
    {
        $tamanhos = getimagesize($request->imagem);
        $largura = $tamanhos[0];
        $altura = $tamanhos[1];
        if ($largura > 350 && $altura > 170) {
            return "> 350";
        } else {
            try {
                $file = $request->file('imagem');
                $local = 'img/banners';
                $name = 'banner' . $request->link . '-' . date('Y-m-d', time()) . '-hora-' . date('H-i-s', time()) . '-pf.' . $file->getClientOriginalExtension();
                $file->move($local, $name);
                $imagemFinal = "/" . $local . "/" . $name;

                $salvar = \App\Models\Empresa::find($request->id);
                $salvar->imagem = $imagemFinal;
                $salvar->save();

                session()->flash('success', 'Imagem salva com sucesso!');
                return redirect()->back();
            } catch (\Exception $e) {
                session()->flash('error', 'Erro ao salvar o imagem: ' . $e->getMessage());
                return redirect()->back();
            }
        }
    }
}
