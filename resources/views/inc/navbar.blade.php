<link href="{{ asset('css/inc/navbar.css') }}" rel="stylesheet">

<nav>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" id="navbarNavItems">
          <li class="nav-item">
            <a class="nav-link" id="homePageLink" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="stampsPageLink" href="{{ route('stamps.index') }}">Stamps</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="costumizePageLink" href="#">Costumize</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contactsPageLink" href="#">Contacts</a>
          </li>
        </ul>
      </div>
</nav>

<script src="{{ asset('js/navbar/navbar.js') }}"></script>