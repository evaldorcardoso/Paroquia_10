<?php

namespace App\Http\Controllers;

use App\Models\congregacao;
use Illuminate\Http\Request;

class CongregacaoController extends Controller
{
    public function index(){
        $congregacao = congregacao::latest()->paginate();
        return view('congregacao.index', compact('congregacao'));
    }
}
