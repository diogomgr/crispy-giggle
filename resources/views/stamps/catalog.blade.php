@extends('layouts.app')

@section('links')
<link href="{{ asset('css/stamps/catalog.css') }}" rel="stylesheet">

@endsection


@section('content')
    <h1>Catalog</h1>
    <div class="stamps-list">
        @foreach ($stampsList as $stamps => $stamp)
        <span class="stamp">
            <a href="/stamp/{{$stamp->id}}"><img src="{{ Storage::url('/estampas/' . $stamp->imagem_url) }}" alt="stamp_image"></a>
                <p><strong>Name: </strong>{{ $stamp->nome }}</p>
                <p><strong>Description: </strong>{{ $stamp->descricao }}</p>
        </span>
        @endforeach
    </div>

    {{ $stampsList->links() }}
@endsection


@section('scripts')
<script src="{{ asset('js/pages/estampas/profile.js') }}"></script>
@endsection