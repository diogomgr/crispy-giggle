@extends('layouts.app')
@section('title', 'Historico')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/encomendas/encomendas.css') }}">
<h2>Historico Encomendas</h2>

@foreach ($historico as $historico => $e)
    <div class="listaEncomendas">
        <div class="encomenda" id="encomenda_{{ $e->id }}">
            <h3>Data: {{ $e->data }}</h1>   
            <h4>Estado: {{ $e->estado }}</h2>
            <h4>Preço: {{ $e->preco_total }}</h3>
        </div>
    </div>
@endforeach


@endsection