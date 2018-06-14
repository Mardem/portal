<?php

namespace App\Http\Controllers\Aberto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $noticiasPF = \App\Models\Noticia::where('postado', '=', 2)->get();
        $noticias = \App\Models\Noticia::where('postado', '=', '1')->orderBy('id', 'desc')->limit(9)->get();
        $banners = \App\Models\Banner::where('ativo', '=', md5(1))->get();
        $plantoes = \App\Models\Plantao::paginate(5);
        $pontos = \App\Models\Turistico::where('home', 1)->get();
        return view('entrada', compact('noticiasPF', 'noticias', 'banners', 'plantoes', 'pontos'));
    }

    public function portfolio(Request $request, $link)
    {
        try {
            $portfolio = \App\Models\Empresa::where('link', '=', $link)->get()[0];
            $padrao = \App\Models\Portfolio::where('empresa', $portfolio->id)->get()[0];

            $ofertas = \App\Models\ProdutosPortfolio::where('empresa', $portfolio->id)->where('tipo', 0)->get();
            $produtos = \App\Models\ProdutosPortfolio::where('empresa', $portfolio->id)->where('tipo', 1)->get();

            if ($padrao->publicar == 1) {
                return view('aberto.portfolio.show')->with(['info' => $portfolio, 'padrao' => $padrao, 'ofertas' => $ofertas, 'produtos' => $produtos]);
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
