<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    public function index ()
    {
        try {
            $eventos = \App\Models\Evento::paginate();
        } catch (\Exception $e){
            $eventos = [];
            session()->flash('error', 'Não foi possível trazer nenhum resultado ' . $e->getMessage());
        }
        return view('cadastro.eventos.todos', compact('eventos'));
    }

    public function apagar($id)
    {
        try {
            $evento = \App\Models\Evento::find($id);
            $evento->delete();
            session()->flash('success', 'Evento apagado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Não foi possível apagar este evento ' . $e->getMessage());
        }
        return redirect()->back();
    }

    public function permitir (Request $request)
    {
        dd($request->all());
    }
}
