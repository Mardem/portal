<?php

namespace App\Http\Controllers\Build;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildController extends Controller
{
    public function portfolioV2()
    {
        return view('portfolio.templates.v2');
    }
}
