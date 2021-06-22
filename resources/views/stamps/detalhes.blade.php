@extends('layouts.app')

@php
session_start();    
$_SESSION["carrinho"] = array();               
@endphp

@section('links')
<link href="{{ asset('css/stamps/detalhes.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h2>Stamp: {{ $stamp->nome }}</h2>
    <form action="{{route('carrinho.add', $stamp->id)}}" method="post">
        @csrf
    <div class="stamps-area">
        <div class="stamp">
            <div class="stamp-imagem">
                <img src="{{Storage::url('/estampas/'.$stamp->imagem_url)}}" alt="Cor da stamp">
            </div>
            <div class="stamp-info-area">
                <div class="stamp-info">
                    <span class="stamp-label">Cor</span>
                    <span class="stamp-info-desc">{{ $stamp->nome }}</span>
                </div>
            </div>
        </div>
        
        
        <div class="tamanhos">
            <h3>Tamanhos:</h3>
            <div class="tamanhosList">
                <span class="tamanho">XS<input type="radio" id="XS" value="XS" name="tamanho"></span>
                <span class="tamanho">S<input type="radio" id="S" value="S" name="tamanho"></span>
                <span class="tamanho">M<input type="radio" id="M" value="M" name="tamanho"></span>
                <span class="tamanho">L<input type="radio" id="L" value="L" name="tamanho"></span>
                <span class="tamanho">XL<input type="radio" id="XL" value="XL" name="tamanho"></span>
            </div>

            <h3>Quantidade:</h3>
            <input type="number" id="quantidade" name="quantidade" min=1><br><br>
        
        </div>

    </div>
    <div>
        <h2>stamp:</h2>
        <div class="tshirts-area">
        @foreach ($listaTshirts as $tshirts=> $tshirt)
        
            <div class="tshirt">
                <label>
                    <div class="tshirt-imagem">
                        <img class="stamp-shirt" src="{{Storage::url('/estampas/'.$stamp->imagem_url)}}" alt="Cor da stamp">
                        <img src="{{Storage::url('/tshirt_base/'.$tshirt->codigo)}}.jpg" alt="Cor">
                        <span class="tshirt-info-desc">{{ $tshirt->nome }}</span>
                        <span class="Cor"><input class="cor_radio" type="radio" id="Cor_{{$tshirt->codigo}}" value="{{$tshirt->codigo}}" name="cor"></span>
                    </div>
                    <div class="tshirt-info-area">
                        <div class="tshirt-info">
                        </div>
                    </div>
                </label>
            </div>
            
        

            
        @endforeach
        </div>

        <button class="w-100 btn btn-primary btn-lg" type="submit">ADD to Cart</button>
    </form>
    </div>
@endsection
