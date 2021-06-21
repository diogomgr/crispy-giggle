<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Preco;
use App\Encomenda;
use App\Estampa;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class EncomendaController extends Controller
{
    public function addToCart(Request $request)
    {
        $stamp = Estampa::findOrFail($request->route('id'));

        $request->input('quantidade') >= Preco::pluck('quantidade_desconto') ? $desconto = "_desconto" : $desconto = "";


        if(empty($stamp->cliente_id)){
            $price = Preco::pluck('preco_un_catalogo' . $desconto)->first();
        } else {
            $price = Preco::pluck('preco_un_proprio' . $desconto)->first();
        }
        var_dump($price);
        
        Cart::add([
            'id'        => $request->input('cor'),
            'name'      => $stamp->id,
            'qty'       => $request->input('quantidade'),
            'price'     => floatval($price),
            'options'   => [
                'size'  => $request->input('tamanho')
            ]
        ]);
        var_dump(Cart::content());
        return view('stamps.catalog', compact('stampsList'));
    }

    public function estadoEncomendas()
    {
        $encomendas = Encomenda::where('estado', 'pendente')
        ->where('cliente_id', Auth::id())
        ->get();

        return view('encomendas.index', compact('encomendas'));
    }

}
