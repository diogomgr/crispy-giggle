<link href="{{ asset('css/navbar/navbar.css') }}" rel="stylesheet">

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ route('stamps.catalog') }}" id="stampsPageLink" class="nav-link px-2">Stamps</a></li>
        </ul>
    @auth
        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link cart-link">
                <a class="" href="{{ route('carrinho.index') }}"><i class="bi-basket"></i></a>
              </a>
            </li>
          </ul>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropDownNavbar" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ empty(Auth::user()->foto_url) ? Storage::url('/fotos/' . Auth::id() . '.jpg') : Storage::url('/fotos/' . Auth::user()->foto_url) }}" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropDownNavbar"> @switch(Auth::user()->tipo)
              @case('F')
                  <a class="dropdown-item" href="{{ route('encomendas.index') }}">Encomendas</a>
                  <a class="dropdown-item" href="{{ route('historico.index') }}">Historico</a>
                  @break
              @case('A')
                  <li>
                      <h6 class="dropdown-header">Admin only</h6>
                  </li>
                  <li>
                      <a class="dropdown-item" href="{{ route('user.staff') }}">Listar Staff</a>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
                  <li>
                      <h6 class="dropdown-header">Staff Only</h6>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('encomendas.index') }}">Encomendas</a>
                  </li>
                        <li>
                      
                      <a class="dropdown-item" href="{{ route('historico.index') }}">Historico</a>
                    </li>
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
                  <li>
                    <a class="dropdown-item" href="{{ route('encomendas.index') }}">Encomendas</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('historico.index') }}">Historico</a>
                  </li>
                  @break
              @default
                  
          @endswitch
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            </ul>
        </div>
    @endauth

    @guest
        @if (Route::has('login'))
            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
        @endif

        @if (Route::has('register'))
            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
        @endif
    @endguest

    
    <script src="{{ asset('js/navbar/navbar.js') }}"></script>
</div>
