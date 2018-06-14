<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios.dados');
    }

    public function updateData(Request $request)
    {
        try {
            $u = \App\User::find($request->id);
            $u->cpf = $request->cpf;
            $u->save();

            session()->flash('success', 'Dados atualizados com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                session()->flash(
                    'error',
                    'Já existe um usuário cadastrado com esse CPF!'
                );
            } else {
                session()->flash(
                    'error',
                    'Houve um erro ao atualizar os dados: ' . $e->getMessage()
                );
            }
            return redirect()->back();
        }
    }

    public function pesquisa(Request $request)
    {
        try {
            $u = \App\User::where('cpf', '=', md5($request->pesquisa))->get()[0];
            $vinculoEmpresa = \App\Models\Empresa::where('vinculo', '=', $u->empresa)->paginate();
            try {
                $userVinculado = Crypt::decryptString($u->empresa);
            } catch (\Exception $e) {
                $userVinculado = $u->empresa;
            }
            $empresas = \App\Models\Empresa::where('vinculo', '=',
                $userVinculado)->count();


            return view('usuarios.pesquisa', compact('u',
                'vinculoEmpresa', 'empresas'));
        } catch (\Exception $e) {
            session()->flash('error', 'Usuário não encontrado!' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function pesquisarEmpresa(Request $request)
    {

        if ($request->cnpj == '') {
            session()->flash('error', 'Empresa não encontrada!');
            return redirect()->route('todosCadastros');
        } else {
            try {
                $vE = \App\Models\Empresa::where('cnpj', '=', md5($request->cnpj))->get()[0];
                $user = \App\User::find($request->usuario);
                return view('vinculos.empresa-usuario', compact('vE', 'user'));
            } catch (\Exception $e) {
                session()->flash('error', 'Empresa não encontrada!');
                return redirect()->route('todosCadastros');
            }
        }
    }

    public function vincularEmpresa($empresa, $usuario)
    {
        try {
            $u = \App\User::find($usuario);
            $u->empresa = $empresa;
            $u->save();

            $e = \App\Models\Empresa::find($empresa);
            $e->vinculo = $usuario;
            $e->save();
            session()->flash('success', 'Empresa vinculada com sucesso!');
            return redirect()->route('verEmpresa', $empresa);

        } catch (\Exception $e) {
            session()->flash('error', 'Não foi possível realizar o vinculo: ' . $e->getMessage());
            return redirect()->route('verEmpresa', $empresa);
        }
    }

    public function removerVinculo($empresa, $usuario)
    {
        try {
            $u = \App\User::find($usuario);
            $u->empresa = Crypt::encryptString('');
            $u->save();

            $e = \App\Models\Empresa::find($empresa);
            $e->vinculo = Crypt::encryptString('');
            $e->save();
            session()->flash('success', 'Vinculo removido com sucesso!');
            return redirect()->route('verEmpresa', $empresa);

        } catch (\Exception $e) {
            session()->flash('error', 'Não foi possível remover o vinculo: ' .
                $e->getMessage());
            return redirect()->route('verEmpresa', $empresa);
        }
    }

    public function verEmpresaUsuario(Request $request)
    {
        $e = \App\Models\Empresa::
                                where('cpf', '=', \Auth::user()->cpf)
                                ->where('plano', '=', 3)
                                ->where('id', '=', $request->id)->get()[0];
        if ($e->count() == 0) {
            session()->flash('error', 'Você não pode administrar esta empresa.');
            return redirect()->back();
        } else {

            return view('usuarios.verUser', compact('e'));
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
}
