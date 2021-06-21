<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Encomenda;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HistoricoController extends Controller
{
    
    public function historicoEncomendas()
    {
        $historico = Encomenda::where('estado', 'fechada')
        ->where('cliente_id', Auth::id())
        ->get();

        return view('historico.index', compact('historico'));
    }

}