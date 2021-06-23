@extends('layouts.app')

@section('links')
<link href="{{ asset('css/stamps/selected.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page">
        <div class="left">
            <h3 class="category-title">
                Stamp
            </h3>
            <hr>
            <span>{{ $stamp->nome }}</span>
            <div class="preview">
                <div class="tshirt-image-container">
                    <img id="tshirt-image" class="tshirt-image" src="{{Storage::url('/tshirt_base/1e1e21.jpg')}}" alt="Tshirt Color Image">
                </div>
                <div class="stamp">
                    <div class="stamp-image">
                        <img src="{{Storage::url('/estampas/'.$stamp->imagem_url)}}" alt="Cor da stamp">
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            
            <form action="{{route('carrinho.add', $stamp->id)}}" method="post">
                @csrf
                <div class="color-container">
                    <h3 class="category-title">
                        Color
                    </h3>
                    <hr>
                    <div id="colorsList">
                        @foreach ($listaTshirts as $tshirts=> $tshirt)
                        <label for="color" class="color-label">
                            <span class="color" style="background-color: #{{ $tshirt->codigo }}">
                                <input type="radio" id="{{ $tshirt->codigo }}" value="{{ $tshirt->codigo }}" name="color">
                            </span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <br>
                <br>
                <div class="size-container">
                    <h3 class="category-title">
                        Size
                    </h3>
                    <hr>
                    <div id="sizesList">
                        <span class="size">
                            <label for="size">
                                <p>XS</p>
                                <input type="radio" value="XS" name="size">
                            </label>
                        </span>
                        <span class="size">
                            <label for="size"><p>S</p><input type="radio" id="S" value="S" name="size"></label></span>
                        <span class="size"><label for="size"><p>M</p><input type="radio" id="M" value="M" name="size"></label></span>
                        <span class="size"><label for="size"><p>L</p><input type="radio" id="L" value="L" name="size"></label></span>
                        <span class="size"><label for="size"><p>XL</p><input type="radio" id="XL" value="XL" name="size"></label></span>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="quantity-container">
                        <h3 class="category-title">
                            Quantity
                        </h3>
                        <hr>
                        <span><strong>Number of T-shirts: </strong></span><input type="number" id="quantity" name="quantity" min=1><br><br>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input class="d-none" id="inputSizeForm" type="text" value="11111" name="size">
                    <input class="d-none" id="inputColorForm" type="text" value="bbbbb" name="color">
                    <button class="w-100 btn" id="submitBtn" type="submit">Add to Cart</button>
                    
                </form>
            </div>
        </div>


    <!--

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
            
            
            <div class="sizes">
                <h3>sizes:</h3>
                <div class="sizesList">
                    <span class="size">XS<input type="radio" id="XS" value="XS" name="size"></span>
                    <span class="size">S<input type="radio" id="S" value="S" name="size"></span>
                    <span class="size">M<input type="radio" id="M" value="M" name="size"></span>
                    <span class="size">L<input type="radio" id="L" value="L" name="size"></span>
                    <span class="size">XL<input type="radio" id="XL" value="XL" name="size"></span>
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

    -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/stamps/selected.js') }}"></script>
@endsection