<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BairrosController extends Controller
{
    public function index()
    {
        $bairros = \App\Models\Bairro::orderBy('id', 'des')->get();

        return view('cadastro.bairros.todos', compact('bairros'));
    }

    public function remove($id)
    {
        try {
            $b = \App\Models\Bairro::find($id);
            $b->delete();

            session()->flash('success', 'Bairro apagado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao apagar o bairro: ' . $e->getMessage());
        }
         return redirect()->back();
    }
    public function save(Request $request)
    {
        try {
            $check = \App\Models\Bairro::where('bairro', $request->bairro)->count();
            if ($check != 0) {
                session()->flash('error', 'Já existe um bairro!');
            } else {
                $b = new \App\Models\Bairro;
                $b->bairro = $request->bairro;
                $b->save();
                session()->flash('success', 'Bairro criado com sucesso!');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao salvar o bairro: ' . $e->getMessage());
        }
        return redirect()->back();
    }
}
