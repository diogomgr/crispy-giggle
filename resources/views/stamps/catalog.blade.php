@extends('layouts.app')

@section('links')
<link href="{{ asset('css/stamps/catalog.css') }}" rel="stylesheet">

@endsection


@section('content')


<div class="page">
    <div class="filters">
        <div class="filter-category">
            <p class="filter-category-title">
                Category
            </p>
            <hr>
            <div id="listBadges">

            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="colorDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Expand
                </button>
                <ul class="dropdown-menu" aria-labelledby="colorDropdown">
                    @foreach ($categoryList as $categories => $category)
                        <li>
                            <a class="dropdown-item" onclick="selectedCategory('{{ $category->nome }}', 'categoria_{{ $category->id }}')">{{ $category->nome }}</a>
                        </li>
                        <hr>
                    @endforeach  
                </ul>
            </div>    
            <form action="{{ route('stamps.index') }}" method="post">
                @csrf
                <input class="d-none" type="text" value="" id="listOfCategories" name="listOfCategories">
                <button class="btn" id="filterCategories" type="submit">Filter</button> 
            </form>    
        </div>
    </div>
    <div class="stamps-list">
        @foreach($stampsList as $stamps => $stamp)
            <span class="stamp">
                <div>
                    <span>
                        <div>
                            <a href="/stamp/{{$stamp->id}}">
                                <img src="{{ Storage::url('/estampas/' . $stamp->imagem_url) }}" class="img-radius" alt="stamp_image">
                            </a>
                        </div>
                        <span>
                            <div class="top">
                                <h3>Name:</h3> <h4>{{ $stamp->nome }}</h4>
                            </div>
                            <div class="bottom">
                                <h3>Category:</h3> 
                                <h4>
                                    @foreach ($categoryList as $categories => $category)
                                        @if ($category->id === $stamp->categoria_id)
                                            {{ $category->nome }}
                                        @endif
                                    @endforeach
                                </h4>
                            </div>
                        </span>
                    </span>
                </div>
                <p><strong>Description: </strong>{{ $stamp->descricao }}</p>
            </span>        
        @endforeach
        {{ $stampsList->links() }}
    </div>
</div>










 <!--   
    {{--
    <h1>Catalog</h1>
    <div class="stamps-list">
        @foreach ($stampsList as $stamps => $stamp)
        <span class="stamp">
            <a href="/stamp/{{$stamp->id}}">
                <img src="{{ Storage::url('/estampas/' . $stamp->imagem_url) }}" alt="stamp_image">
            </a>
            <p><strong>Name: </strong>{{ $stamp->nome }}</p>
            <p><strong>Description: </strong>{{ $stamp->descricao }}</p>
        </span>
        @endforeach
    </div>

    {{ $stampsList->links() }}

    --}}
-->
@endsection


@section('scripts')
<script src="{{ asset('js/stamps/catalog.js') }}"></script>
@endsection