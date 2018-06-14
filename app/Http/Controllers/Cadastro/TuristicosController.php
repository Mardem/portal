<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TuristicosController extends Controller
{
    public function index ()
    {
        $p = \App\Models\Turistico::paginate();
        return view('cadastro.pontos-turisticos.todos', ['p' => $p]);
    }

    public function novoPonto()
    {
        return view('cadastro.pontos-turisticos.pontos');
    }

    public function salvarPonto(Request $request)
    {
        try {
            $ponto = new \App\Models\Turistico;
            $ponto->nome = $request->nome;
            $ponto->link = $request->link;
            $ponto->home = 1;
            $ponto->save();

            session()->flash('success', 'O ponto foi criado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao criar o ponto: ' . $e->getMessage());
        }
        return redirect()->back();
    }
}
