<?php

namespace App\Http\Controllers\Noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function compor()
    {
        $categorias = \App\Models\Categoria::where('local', '=', 1)->get();
        return view('noticias.compor', compact('categorias'));
    }

    public function allNews()
    {
        $noticias = \App\Models\Noticia::where(
            'email', '=', \Auth::user()
            ->email
        )->orderBy('id', 'desc')->get();
        $cNoticias = \App\Models\Noticia::where(
            'email', '=', \Auth::user()
            ->email
        )->count();

        return view('noticias.todas', compact('noticias', 'cNoticias'));
    }

    public function cadastroCategoriaNoticia (Request $request)
    {
        try {
            $c = new \App\Models\Categoria;
            $c->nome = $request->categoria;
            $c->local = 1;
            $c->descricao = $request->descricao;
            $c->fundo = $request->background;
            $c->save();
            session()->flash('success', 'Categoria cadastrada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Infelizmente ocorreu um erro no cadastro: ' . $e->getMessage()
            );
            return redirect()->back();
        }
    }

    public function save(Request $request)
    {
        $validate = $request->validate(
            [
                'titulo' => 'required',
                'descricao' => 'required',
                'imagem' => 'mimes:jpeg,png,svg',
                'linkNoticia' => 'required'
            ]
        );


       try {
           $file = $request->file('imagem');
           $local = 'img/noticias';


           if ($file == null) {
               $erro = 0;
           } else {
               $erro = $file->getError();
           }


           if ($erro == 1) {
               session()->flash(
                   'error',
                   'Infelizmente não foi possível cadastrar este livro, ele é maior que o permitido.'
               );
               return redirect()->back();
           } else {

               if ($file == null) {
                   session()->flash(
                       'msgError',
                       'Não foi possível mover o arquivo, tente novamente!'
                   );
                   return redirect()->back();
               } else {
                   $name = 'n-' . time() . '-pf.' .
                       $file->getClientOriginalExtension();
                   $file->move($local, $name);
                   $image = "/" . $local . "/" . $name;

                   $n = new \App\Models\Noticia;
                   $n->descricao = $request->descricao;
                   $n->link = $request->linkNoticia;
                   $n->autor = \Auth::user()->name;
                   $n->titulo = $request->titulo;
                   $n->code = $request->code;
                   $n->imagem = $image;
                   $n->postado = $request->postado;
                   $n->email = \Auth::user()->email;
                   $n->categoria = $request->categoria;
                   $n->save();

                   session()->flash('success', 'Notícia adicionada com sucesso!');
                   return redirect()->back();
               }
           }
       } catch (\Exception $e) {
           session()->flash('error', 'Não foi possível inserir a notícia: ' . $e->getMessage());
           return redirect()->back();
       }

    }

    public function delete(Request $request)
    {
        try {
            $file = substr($request->imagem, 1);
            unlink($file);
            $n = \App\Models\Noticia::find($request->id);
            $n->delete();
            session()->flash('success', 'Notícia apagada com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('success', 'Infelizmente não foi possível apagar a notícia: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
