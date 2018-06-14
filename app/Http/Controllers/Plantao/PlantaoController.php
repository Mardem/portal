<?php

namespace App\Http\Controllers\Plantao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;

class PlantaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $p = \App\Models\Plantao::all();
        } catch (\Exception $e) {
            session()->flash('error', 'Não consegui trazer os dados: ' . $e->getMessage());
        }
        return view('cadastro.plantao.todos', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criarPlantao()
    {
        return view('cadastro.plantao.plantao');
    }

    public function salvarPlantao(Request $request)
    {
        $date  = Date::createFromTime(8, 0, 0)->add('1 day')->format('Y-m-d H:i:s');
        $fim = new Date($date);
        try {
            $p = new \App\Models\Plantao;
            $p->nome = $request->nome;
            $p->endereco = $request->endereco;
            $p->long = $request->long;
            $p->lat = $request->lat;
            $p->termino = $date;
            $p->save();

            session()->flash('success', 'Empresa cadastrada com sucesso! A empresa será removida automaticamente em: ' . $fim->format('l j F Y \á\s H:i'));
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao inserir a empresa: ' . $e->getMessage());
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $plantao = \App\Models\Plantao::find($id);
            $plantao->delete();
            session()->flash('success', 'Plantão removido com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Não foi possível excluir este plantão: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
