@extends('layouts.app')
@section('title', 'Encomendas')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/encomendas/encomendas.css') }}">
<h2>Encomendas</h2>

@foreach ($encomendas as $encomenda => $e)
    <div class="listaEncomendas">
        <div class="encomenda" id="encomenda_{{ $e->id }}">
            <h3>Data: {{ $e->data }}</h1>   
            <h4>Estado: {{ $e->estado }}</h2>
            <h4>Preço: {{ $e->preco_total }}</h3>
        </div>
    </div>
@endforeach

{{--
<form method="POST" action="{{ route('encomendas.create') }}">
    @csrf
    <input type="submit" value="Submit">
</form>
--}}

@endsection