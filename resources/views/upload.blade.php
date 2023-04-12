<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body>
    
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

    <main class="container">
        <br>
        <div class="bg-light p-5 rounded">
            <blockquote class="blockquote mt-3">
                <h2>Upload Data Mahasiswa</h2>
            </blockquote>
            <br>
            <div class="row justify-content">
                <div class="col-md-8">
                    <form method="POST" action="/homeadmin/upload" enctype="multipart/form-data">
                        @csrf
                        <td><h5>Upload Dokumen Bank (PDF) :</h5></td>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="dokumen" required>
                            </div>
                        </div>
                        <br>
                        <td><h5>Upload Foto Mahasiswa (JPG, JPEG, PNG) :</h5></td>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" class="form-control" name="nim" value="{{$nim}}">
                        <div class="col-md-6 offset-md-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <hr>
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      
  </body>
</html>