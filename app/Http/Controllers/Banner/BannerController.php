<?php

namespace App\Http\Controllers\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function todos()
    {

        $bCount = \App\Models\Banner::count();
        $banners = \App\Models\Banner::orderBy('id', 'des')->get();

        return view('cadastro.banners.todos', compact('banners', 'bCount'));
    }

    public function criarBanner()
    {
        return view('cadastro.banners.banner');
    }

    public function salvarBanner(Request $request)
    {

        $validate = $request->validate(
            [
                'nome' => 'required',
                'link' => 'required',
                'imagem' => 'required|mimes:jpeg,png,svg',
            ]
        );

        try {
            $b = new \App\Models\Banner;
            $b->nome = $request->nome;
            $b->link = $request->link;
            $b->ativo = md5(1);
            $b->imagem = upload_img($request->file('imagem'), 'img/banners', 'banner-');;
            $b->save();

            session()->flash('success', 'Banner adicionado com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar o banner: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function apagarBanner(Request $request)
    {


        try {
            $file = substr($request->imagem, 1);
            unlink($file);
            $b = \App\Models\Banner::find($request->id);
            $b->delete();

            session()->flash('success', 'Banner apagado com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Infelizmente não foi possível apagar este banner: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function desativarBanner($id, $opt)
    {
        try {
            $b = \App\Models\Banner::find($id);
            $b->ativo = md5($opt);
            $b->save();

            if ($opt == 1) {
                session()->flash('success', 'Banner ativado com sucesso!');
            } else if($opt == 0) {
                session()->flash('success', 'Banner desativado com sucesso!');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Infelizmente não foi possível desativar o banner: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
