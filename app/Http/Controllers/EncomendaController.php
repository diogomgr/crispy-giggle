<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preco;
use App\Estampa;
use App\Cor;
use App\Encomenda;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class EncomendaController extends Controller
{
    public function addToCart(Request $request)
    {
        $stamp = Estampa::findOrFail($request->route('id'));
        $stampsList = Estampa::orderBy('id')->simplePaginate(9);

        $request->input('quantidade') >= Preco::pluck('quantidade_desconto')->first() ? $desconto = "_desconto" : $desconto = "";


        if(empty($stamp->cliente_id)){
            $price = Preco::pluck('preco_un_catalogo' . $desconto)->first();
        } else {
            $price = Preco::pluck('preco_un_proprio' . $desconto)->first();
        }
        
        Cart::add([
            'id'        => $request->input('cor'),
            'name'      => $stamp->id,
            'qty'       => $request->input('quantidade'),
            'price'     => floatval($price),
            'options'   => [
                'size'  => $request->input('tamanho')
            ]
        ]);

        return view('stamps.catalog', compact('stampsList'));
    }

    public function viewCart()
    {
        $cartList = Cart::content();
        $tshirtList = array();
        $stampsList = array();
        $i = 0;

        foreach ($cartList as $cart => $cartItem) {
            $stamp = Estampa::where('id', $cartItem->name)->whereNull('deleted_at')->first();
            $tshirt = Cor::where('codigo', $cartItem->id)->whereNull('deleted_at')->first();

            array_push($tshirtList, $tshirt);
            array_push($stampsList, $stamp); 
        }
        $data = array(
            "cartList" => $cartList,
            "tshirtList" => $tshirtList,
            "stampsList" => $stampsList
        );
        
        return view('pages.cart')->with($data);
    }

     public function estadoEncomendas()
    {
        $encomendas = Encomenda::where('estado', 'pendente')
        ->where('cliente_id', Auth::id())
        ->get();

        return view('encomendas.index', compact('encomendas'));
    }

}
