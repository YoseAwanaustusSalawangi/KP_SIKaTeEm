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
            <h2>Form Data Mahasiswa</h2>
        </blockquote>
        
        <form method="post" action="/homeadmin/simpan">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="formGroupExampleInput">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" placeholder="Masukan Nim">
            </div>
            <br>
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="namaMhs" id="namaMhs" placeholder="Masukan Nama Mahasiswa">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Program Studi</label>
                <select class="form-control" name="prodi" id="prodi">
                    <option value="0">--Pilih Program Studi--</option>
                    <option value="Filsafat Keilahian">Filsafat Keilahian</option>
                    <option value="Arsitektur">Arsitektur</option>
                    <option value="Desain Produk">Desain Produk</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Profesi Dokter">Profesi Dokter</option>
                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                 </select>
            </div>
            <br>
            <input type="submit" class="btn btn-outline-success" value="Simpan">
        </form>
        
        </div>
        <div>
            <hr>
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      
  </body>
</html>