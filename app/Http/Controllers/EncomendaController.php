<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preco;
use App\Estampa;
use App\Cor;
use App\Encomenda;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

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

    public function removeItem(Request $request)
    {
        Cart::remove($request->route('id'));

        $cartList = Cart::content();
        $tshirtList = array();
        $stampsList = array();

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
        $encomendasPendentes = Encomenda::where('estado', 'pendente')
        ->where('cliente_id', Auth::id())
        ->get();

        
        $encomendasPagas = Encomenda::where('estado', 'paga')
        ->where('cliente_id', Auth::id())
        ->get();

        $data = array(
            "encomendasPagas" => $encomendasPagas,
            "encomendasPendentes" => $encomendasPendentes
        );

        return view('encomendas.index')->with($data);
    }

    /*
    public function create(Request $request)
    {
        
        $data = array(
            'estado' => 'paga',
            "cliente_id" => 522,
            "data" => '2021-06-21', 
            "preco_total" => 30,
            'notas' => null,
            'NIF' => 999999999,
            'endereco' => 'Rua do Vale do Grelo, 123-1233 Alheias',
            'tipo_pagamento' => 'PAYPAL',
            'ref_pagamento' => 'olacnogaspar@gmail.com',
            'recibo_url' => null
        );
        DB::table('encomendas')->insert($data);
    }
    */
}
