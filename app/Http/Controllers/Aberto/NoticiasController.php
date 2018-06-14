<?php

namespace App\Http\Controllers\Aberto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticiasController extends Controller
{
    public function mostrarNoticia($link)
    {
        $nC = \App\Models\Noticia::where('link', '=', $link)->count();
        if ($nC == 0) {
            abort(404);
        } else {
            $noticias = \App\Models\Noticia::inRandomOrder()->limit(3)->where('postado', '=', 1)->get();
            $noticia = \App\Models\Noticia::where('link', '=', $link)->get()[0];

            $categorias = \App\Models\Categoria::inRandomOrder()->limit(6)->where('local', '=', '1')->get();
            return view('public.noticias.ler', compact('noticia', 'noticias', 'categorias'));
        }
    }

    public function pesquisaNoticia(Request $request)
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

        $autor = $request->all()['autor'] ?? [];
        $categorias = \App\Models\Categoria::where('local', '=', 1)->get();
        $autoresCadastrado = \App\User::all();

        $result = \App\Models\Noticia::orderBy($order[0], $order[1])
            ->where(function ($query) use ($pesquisa) {
                if ($pesquisa) {
                    return $query->where('titulo', 'like', $pesquisa[0]);
                }
                return $query;
            })
            ->where(function ($query) use ($categoria) {
                if ($categoria) {
                    return $query->where('categoria', '=', $categoria[0]);
                }
            })
            ->where(function ($query) use ($autor) {
                if ($autor) {
                    return $query->where('autor', '=', $autor);
                }
            })
            ->paginate($limit);
        $outros = \App\Models\Noticia::inRandomOrder()->limit(6)->where('postado', '=', 1)->get();
        $pesquisado = $request->all()['pesquisa'] ?? null;
        return view('aberto.noticias.todas-noticias', compact('result', 'categorias', 'pesquisado', 'autoresCadastrado', 'outros'));
    }
}
