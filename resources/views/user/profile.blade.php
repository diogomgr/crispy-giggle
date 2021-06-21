@extends('layouts.app')

@section('links')
<link href="{{ asset('css/pages/profile.css') }}" rel="stylesheet">

@endsection


@section('content')
<h1>User Profile Page</h1>
<form action="{{ route('user.edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>
    
    <div class="col-12">
        <!-- email_verified_at need to verify to put date  -->
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    
    <div class="col-12">
        <!-- password_updated_at to put date of password change -->
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    
    <div class="col-12">
        <label for="photo" class="form-label">Photo Link</label>
        <input type="file" id="photo" name="photo" class="form-control">
    </div>

    <button class="w-100 btn btn-primary btn-lg" type="submit">Save Profile</button>
</form>
@endsection


@section('scripts')
<script src="{{ asset('js/pages/estampas/profile.js') }}"></script>
@endsection