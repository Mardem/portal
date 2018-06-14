<?php

namespace App\Http\Controllers\Aberto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class EventosController extends Controller
{
    public function index()
    {
        return view('aberto.eventos.eventos');
    }

    public function save(Request $request)
    {
        $data = explode('/', $request->dia);
        try {
            $link = strtolower(str_replace(" ", "-", $request->evento). '-' . $data[0]);

            $e = new \App\Models\Evento;
            $e->evento = $request->evento;
            $e->nome_responsavel = $request->nome;
            $e->cpf = $request->cpf;
            $e->telefone = $request->telefone;
            $e->email = $request->email;
            $e->hora = $request->horas;
            $e->local = $request->endereco;
            $e->descricao = $request->descricao;
            $e->facebook = $request->facebook;
            $e->twitter = $request->twitter;
            $e->instagram = $request->instagram;
            $e->youtube = $request->youtube;
            $e->link = $link;
            $e->valor_ingresso = $request->valor;
            $e->img = upload_img($request->banner, 'img/eventos/banner', 'banner-evento-');
            $e->status = 0;
            $e->save();

            return redirect()->back()->with('success', 'O seu evento foi cadastrado com sucesso! Aguarde nosso contato.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao inserir esse evento');
        }
    }

    public function todosEventos()
    {
        return "todos eventos";
    }

    public function evento ($link)
    {
        return view('aberto.eventos.ver');
    }
}
