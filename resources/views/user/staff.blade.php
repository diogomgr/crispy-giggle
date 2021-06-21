@extends('layouts.app')

@section('links')
<link href="{{ asset('css/pages/profile.css') }}" rel="stylesheet">

@endsection


@section('content')
    <h1>Staff</h1>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($listUser as $users => $user)
            
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a class="btn bg-info text-white" href="/staff/{{$user->id}}/profile">Edit</button></td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection


@section('scripts')
<script src="{{ asset('js/pages/estampas/profile.js') }}"></script>
@endsection