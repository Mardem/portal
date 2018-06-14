<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
    public function index()
    {
        return view('test.test');
    }

    public function autocomplete()
    {
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('users')
            ->where('name', 'LIKE', '%' . $term . '%')->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->name];
        }
        return $results;
    }

    public function pesquisaAjax()
    {
        $revisados = \App\Models\Empresa::where('revisado', '1')->get();
        $categorias = DB::table('categorias')->where('local', 1)->get();

        $list = collect([]);


        foreach($revisados as $revisado) {
            $list = $list->push($revisado->nome);
        }

        foreach($categorias as $categoria) {
            $list = $list->push($categoria->nome);
        }
        return $list;
    }

}
