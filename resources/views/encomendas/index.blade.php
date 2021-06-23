@extends('layouts.app')
@section('title', 'Encomendas')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/encomendas/encomendas.css') }}">
<h2>Encomendas Pendentes</h2>

@foreach ($encomendasPendentes as $encomenda => $pendente)
    <div class="listaEncomendas">
        <div class="encomenda" id="encomenda_{{ $pendente->id }}">
            <h5><b>Data: </b>{{ $pendente->data }}</h5>
            <h5><b>Estado: </b>{{ $pendente->estado }}</h5>
            <h5><b>Preço: </b>{{ $pendente->preco_total }}</h5>
        </div>
    </div>
    
@endforeach

<h2>Encomendas Pagas</h2>

@foreach ($encomendasPagas as $encomenda => $paga)
    <div class="listaEncomendas">
        <div class="encomenda" id="encomenda_{{ $paga->id }}">
            <h5><b>Data: </b>{{ $paga->data }}</h5>
            <h5><b>Estado: </b>{{ $paga->estado }}</h5>
            <h5><b>Preço: </b>{{ $paga->preco_total }}</h5>
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