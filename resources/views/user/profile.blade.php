@extends('layouts.app')

@section('links')
<link href="{{ asset('css/user/profile.css') }}" rel="stylesheet">

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="{{Storage::url('/fotos/' . $user->foto_url)}}" alt="">
                        </a>
                        <h1>{{ $user->name }}</h1>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>

                <form action="{{ route('user.block', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <ul class="nav" @if(Auth::user()->tipo != 'A') style="display: none" @endif>
                    <li> 
                        <button class="btn editBtn">
                            <i class="fa fa-edit"></i> 
                            Edit profile
                        </button>
                    </li>
                    <li> 
                        <button class="btn bg-warning">
                            <i class="fa fa-edit"></i> 
                            Block User
                        </button>
                    </li>
                    <li> 
                        <button class="btn bg-danger">
                            <i class="fa fa-edit"></i> 
                            Erase User
                        </button>
                    </li>
                </ul>
                </form>
            </div>
            <div class="profile-info col-md-9">
                <div class="panel">
                    <div class="bio-graph-heading">
                        Profile
                    </div>
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <div class="bio-row">
                                <p><span><strong>Name </strong></span>: {{ $user->name }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span><strong> Email </strong></span>: {{ $user->email }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span><strong>Tipo</strong> </span>: 
                                    @switch($user->tipo)
                                        @case('C')
                                            Client
                                            @break
                                        @case('A')
                                            Administrator
                                            @break
                                        @case('F')
                                            Employee
                                            @break
                                        @default
                                            UNKNOWN
                                    @endswitch
                                </p>
                            </div>
                            <div class="bio-row">
                                <p><span><strong>Estado</strong> </span>: 
                                    @if ($user->bloqueado == 0)
                                        Not Blocked
                                    @else
                                        Blocked
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                
<form action="{{ route('user.edit') }}" method="post" enctype="multipart/form-data">
    @csrf
                <div class="panel">
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <div class="bio-row">
                                <label for="name" class="form-label"><strong>Name</strong></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="bio-row">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="bio-row">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="bio-row">
                                <label for="photo" class="form-label"><strong>Photo</strong></label>
                                <input type="file" id="photo" name="photo" class="form-control">
                            </div>
                        </div>
                        
                        <button class="btn editBtn" type="submit">
                            <i class="fa fa-edit"></i> 
                            Edit profile
                        </button>
                    </div>
                </div>
            </div>

        </form>


            













        </div>
    </div>
</form>
@endsection


@section('scripts')
<script src="{{ asset('js/pages/estampas/profile.js') }}"></script>
@endsection