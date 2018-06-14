<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Queries administrativas
        $gEmpresasA = \App\Models\Empresa::orderBy('id', 'desc')->get();

        // Contagem para marcadores
        $cUsersA = \App\User::where('category', '=', 0)->count();
        $UsersPagos = \App\Models\Empresa::where('plano', 1)
            ->orWhere('plano', 2)
            ->orWhere('plano', 3)
            ->count();

        // Queries dos usuários
        $gEmpresasU = \App\Models\Empresa::where('cpf', '=', \Auth::user()->cpf)->orderBy('id', 'desc')->get();

        $mensagens = \App\Models\Message::orderBy('id','desc')->paginate(5);

        return view('dashboards.user', compact('cEmpresasU', 'gEmpresasU', 'cEmpresasA', 'gEmpresasA', 'cUsersA', 'UsersPagos', 'mensagens'));
    }

    public function mensagens()
    {
        
    }
}
