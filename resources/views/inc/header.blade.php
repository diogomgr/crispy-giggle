<link href="{{ asset('css/inc/header.css') }}" rel="stylesheet">

    @if(request()->segment(1) === 'login' || request()->segment(1) === 'register')
        <header class="smaller">
    @else
        <header>
    @endif
        <div class="above">
            @if(request()->segment(1) === 'login' || request()->segment(1) === 'register')
                <div class="container-logo-center">
                    <a class="logo" href="/">MAGICSHIRTS</a>
                </div>
            @else
                <div class="container-logo">
                    <a class="logo" href="/">MAGICSHIRTS</a>
                </div>
            @endif
            @auth
                <div class="icons">
                    <a class="icon" href="{{ route('carrinho.index') }}">
                        <i class="bi bi-cart-fill"></i>
                    </a>

                    <div class="dropdown">
                        <a href="#" class="icon" id="dropDownUser"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropDownUser">
                            @switch(Auth::user()->tipo)
                                @case('F')
                                    @break
                                @case('A')
                                    <li>
                                        <h6 class="dropdown-header">Admin only</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Dashboard</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.staff') }}">Staff</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <h6 class="dropdown-header">User</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    @break
                                @case('C')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    @break
                                @default
                                    
                            @endswitch
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth

            @guest
                @if(request()->segment(1) === 'login')
                    @if (Route::has('login'))
                        <a class="btn btn-secondary me-2" href="{{ route('login') }}">Login</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    @if (Route::has('login'))
                        <a class="btn btn-outline-dark me-2" href="{{ route('login') }}">Login</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
                    @endif
                @endif
            @endguest
        </div>
        
    @if(request()->segment(1) === 'login' || request()->segment(1) === 'register')
    @else
        @include('inc.navbar')
    @endif
</header>