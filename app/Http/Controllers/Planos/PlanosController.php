<?php

namespace App\Http\Controllers\Planos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanosController extends Controller
{
    public function index()
    {
        return view('planos.planos');
    }
}
