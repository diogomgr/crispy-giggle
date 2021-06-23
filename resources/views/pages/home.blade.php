@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/pages/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page">
        <div class="left">
            <img src="{{Storage::url('/fotos/landing-image.jpg')}}" class="landing-image" alt="Landing Image">    
        </div>
        <div class="right">
            <a class="logo" href="/">MAGICSHIRTS</a>
            <div>
                <p>
                    Os clientes da loja online "MagicShirts" poderão escolher as estampas a partir do catálogo online da loja ou enviar para o servidor Web imagens com as suas próprias estampas. A "MagicShirts" irá então imprimir as estampas nas t-shirts e enviá-las para casa dos clientes. 
                </p>
                <p>
                    Cada cliente poderá adicionar t-shirts a um carrinho de compras (o carrinho de compras deverá ser mantido na sessão do servidor web), selecionando para cada t-shirt a estampa (do catálogo da loja ou a partir de uma imagem introduzida pela cliente), a cor e tamanho da t-shirt e a quantidade de t-shirts a adquirir. Associado a cada t-shirt do carrinho de compras ficará também o preço unitário e o subtotal (quantidade × preço unitário). O carrinho de compras inclui também um total que corresponde  à  soma  de  todos  subtotais  das  t-shirts  do  carrinho.  
                </p>
                <p>
                    O  cliente  poderá  adicionar  e remover t-shirts do carrinho, bem como alterar a cor, tamanho e quantidade de cada t-shirt no carrinho (se quantidade for zero, a t-shirt deverá ser removida do carrinho de compras).
                </p>
            </div>
        </div>
    </div>
@endsection