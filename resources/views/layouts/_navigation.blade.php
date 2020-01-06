<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">
            Welcome {{Auth::user()->name}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            Logout
        </a>
      </li>
    </ul>
  </nav>