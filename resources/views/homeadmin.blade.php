<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body>
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
        <a class="navbar-brand" href="/homeadmin">SIKaTeEm</a>
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
                <form class="d-flex" method="get" action="/homeadmin/search">
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
    
    <main class="container">
        <div class="bg-light p-5 rounded">
            <blockquote class="blockquote mt-3">
                <h2>Data Mahasiswa Universitas Kristen Duta Wacana</h2>
            </blockquote>

            <blockquote class="blockquote mt-3">
                <a class="btn btn-outline-primary" href="/homeadmin/tambah" role="button">Mahasiswa [+]</a>
                <a class="btn btn-outline-secondary" target="_blank" href="/homeadmin/cetak-data-ktm" role="button">Cetak Data</a>
            </blockquote>

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Dokumen</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Status KTM</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <!--@php $no=1; @endphp!-->
                @foreach($mhs as $no => $m)
                    <tr>
                    <th scope="row"><?php echo ++$no + ($mhs->currentPage()-1)*$mhs->perPage() ?></th>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->namaMhs }}</td>
                    <td>{{ $m->prodi }}</td>
                    @if($m->dokumen == null)
                        <td>Belum Ada Dokumen</td>
                    @else
                        <td><a href="storage/ktm_files/{{$m->dokumen}}" target="_blank">Unduh Dokumen</a></td>
                    @endif
                    @if($m->foto == null)
                        <td>Belum Ada Foto</td>
                    @else
                        <td><a href="storage/foto_files/{{$m->foto}}" target="_blank">Unduh Foto</a></td>
                    @endif
                    @if($m->status == 0)
                            <td>Sedang Diproses</td>
                        @elseif($m->status == 2)
                            <td>Selesai</td>
                        @elseif($m->status == 3)
                            <td>Sudah Diambil</td>
                    @endif
                    <td>
                        <a href="/homeadmin/upload/{{$m->nim}}" class="btn btn-primary">Upload</a> 
                        <td>|</td>
                        <a href="/homeadmin/delete/{{ $m->id }}" class="btn btn-danger">Delete</a>
                        <a href="/homeadmin/edit/{{ $m->id }}" class="btn btn-success">Update</a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            Jumlah Data @php echo $mhs->total() @endphp
            @php echo $mhs->links() @endphp
        </div>
        <div>
            <hr>
        </div>
    </main>
    
    @include('layouts.footer')

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      
  </body>
</html>

