<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estampa;
use App\Cor;
use Auth;

class StampsController extends Controller
{
    public function index()
    {
        $stampsList = Estampa::orderBy('id')->simplePaginate(9);
        return view('stamps.catalog', compact('stampsList'));
    }
    public function detalhes(Request $request)
    {
        $stamp = Estampa::findOrFail($request->route('id'));
        $tshirts = Cor::whereNull('deleted_at')->get();


        $data = array (
            "listaTshirts" => $tshirts,
            "stamp" => $stamp
        );

        return view('stamps.detalhes') ->with($data);
    }

}
