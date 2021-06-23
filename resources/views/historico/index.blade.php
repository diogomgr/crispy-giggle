@extends('layouts.app')
@section('title', 'Historico')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/encomendas/encomendas.css') }}">
<h2>Historico Encomendas</h2>

@foreach ($historico as $historico => $e)
    <div class="listaEncomendas">
        <div class="encomenda" id="encomenda_{{ $e->id }}">
            <h5><b>Data: </b>{{ $e->data }}</h5>   
            <h5><b>Estado: </b>{{ $e->estado }}</h5>
            <h5><b>Preço: </b>{{ $e->preco_total }}</h5>
        </div>
    </div>
@endforeach


@endsection