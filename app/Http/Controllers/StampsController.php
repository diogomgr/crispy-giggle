<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estampa;
use App\Cor;
use App\Categoria;
use Auth;

class StampsController extends Controller
{
    public function index(Request $request)
    {
        
        if(empty($request->input('listOfCategories'))){
            $stampsList = Estampa::orderBy('id')->simplePaginate(12);
        } else {
            $listOfCategory = explode(';', $request->input('listOfCategories'));
            $allCategories = array();
            $temp = array();
            foreach ($listOfCategory as $category) {
                array_push($temp, array_filter(explode(" ", str_replace("categoria_", " ", $category))));
                
            }
            foreach ($temp as $category => $id) {
                array_push($allCategories, array_shift($id));
                
            }
            $stampsList = Estampa::whereIn('categoria_id', array_filter($allCategories))->whereNull('deleted_at')->simplePaginate(12);
        }

        $categoryList = Categoria::orderBy('id')->whereNull('deleted_at')->get();
        $data = array(
            "stampsList" => $stampsList,
            "categoryList" => $categoryList
        );

        return view('stamps.catalog')->with($data);
    }
    public function detalhes(Request $request)
    {
        $stamp = Estampa::findOrFail($request->route('id'));
        $tshirts = Cor::whereNull('deleted_at')->get();


        $data = array (
            "listaTshirts" => $tshirts,
            "stamp" => $stamp
        );

        return view('stamps.selected') ->with($data);
    }

}
