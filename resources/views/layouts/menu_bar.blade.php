<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/home">SIKaTeEm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">
            Selamat Datang, {{ Auth::user()->name }}
          </a>
        </li>
      </ul>
      <form class="d-flex" method="get" action="/home/search">
        <input class="form-control me-2" name="m" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
          <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger">
            <i class="ni ni-circle-08 text-pink"></i>
              <span class="nav-link-text">Logout</span>
          </a>
        </li>
    </div>
  </div>
</nav>