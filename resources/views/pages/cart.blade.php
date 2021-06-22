@extends('layouts.app')

@section('links')
<link href="{{ asset('css/cart/cart.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Shopping cart</h4>
                    <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span
                            class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div>
                </div>
                @foreach ($cartList as $cart => $cartItem)
                
                    <form action="/cart/{{$cartItem->rowId}}" method="post">
                        @csrf
                        <div id="{{ $cartItem->rowId }}" class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                            <div class="mr-1"><img class="rounded" src="{{Storage::url('/tshirt_base/'.$cartItem->id)}}.jpg"
                                    width="70"></div>
                            <div class="d-flex flex-column align-items-center product-details">
                                <span class="font-weight-bold">
                                    @foreach ($stampsList as $stamps => $stamp)
                                        @if ($stamp->id == $cartItem->name)
                                            <strong>Nome: </strong>{{ $stamp->nome }}
                                            @break
                                        @endif
                                    @endforeach
                                </span>
                                <div class="d-flex flex-row product-desc">
                                    <div class="size mr-1">
                                        <span class="text-grey">
                                            <strong>Size:</strong>
                                        </span>
                                        <span
                                            class="font-weight-bold">
                                            {{ $cartItem->options["size"] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row product-desc">
                                    <div class="color">
                                        <span class="text-grey">
                                            <strong>Color:</strong>
                                        </span>
                                        <span class="font-weight-bold">
                                            @foreach ($tshirtList as $tshirt)
                                                @if ($tshirt->codigo == $cartItem->id)
                                                    {{ $tshirt->nome }}
                                                    @break
                                                @endif
                                            @endforeach
                                        </span></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center qty">
                                <h5 class="text-grey mt-1 mr-1 ml-1"> {{ $cartItem->qty }} </h5>
                            </div>
                            <div>
                                <h5 class="text-grey">€{{ $cartItem->price * $cartItem->qty }}</h5>
                            </div>
                            <div class="d-flex align-items-center"><button type="submit"><i class="bi bi-dash-circle text-danger"></i></button></div>
                        </div>
                    </form>
                @endforeach
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button
                        class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
            </div>
        </div>
    </div> 
@endsection


@section('scripts')
<script src="{{ asset('js/pages/stampss/profile.js') }}"></script>
@endsection
