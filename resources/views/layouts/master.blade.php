<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body>
    
    @include('layouts.menu_bar')

    <main class="container">
      <div class="p-5 rounded" style="background-color:#F5F5F5">
      
      <!-- HOME ADMIN -->
      @if(auth()->user()->role == 'admin')
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
                <!-- <td>-</td> -->
                @if($m->status == 0)
                  <td>Sedang Diproses</td>
                @elseif($m->status == 1)
                  <td>Selesai</td>
                @elseif($m->status == 2)
                  <td>Sudah Diambil</td>
                @endif
                <td>
                  <a href="/homeadmin/upload/{{$m->nim}}" class="btn btn-primary">Upload</a> |
                  <a href="/homeadmin/edit/{{ $m->id }}" class="btn btn-success">Update</a>
                  <a href="/homeadmin/delete/{{ $m->id }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        Jumlah Data @php echo $mhs->total() @endphp
        @php echo $mhs->links() @endphp

        <!-- HOME MAHASISWA -->
      @elseif (auth()->user()->role == 'mahasiswa')
        <blockquote class="blockquote mt-3">
          <h2>Status KTM Mahasiswa Universitas Kristen Duta Wacana</h2>
        </blockquote>
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Program Studi</th>
              <th scope="col">Status KTM</th>
            </tr>
          </thead>
          @foreach($mhs as $no => $m)
            <tr>
              <th scope="row"><?php echo ++$no + ($mhs->currentPage()-1)*$mhs->perPage() ?></th>
              <td>{{ $m->nim }}</td>
              <td>{{ $m->namaMhs }}</td>
              <td>{{ $m->prodi }}</td>
              @if($m->status == 0)
                <td>Sedang Diproses</td>
              @elseif($m->status == 1)
                <td>Selesai</td>
              @elseif($m->status == 2)
                <td>Sudah Diambil</td>
              @endif
            </tr>
          @endforeach
        </table>
          Jumlah Data @php echo $mhs->total() @endphp
          @php echo $mhs->links() @endphp

        <th>
          *Jika KTM anda telah selesai diproses, silahkan mengambil KTM anda di bank BNI cabang UKDW
        </th>

        <!--HOME OPERATOR -->
      @elseif (auth()->user()->role == 'operator')
        <blockquote class="blockquote mt-3">
          <h2>Data Mahasiswa Universitas Kristen Duta Wacana</h2>
        </blockquote>
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Prodi</th>
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
                  <td>
                    <form method="post" action="/homeoperator/pilih">
                      @csrf
                      <input type=hidden name="nim" value="{{$m->nim}}">
                      <input type=hidden name="status" value="1">
                      <button type="submit" class="btn btn-outline-primary">Selesai</button>
                    </form>
                  </td>
                @elseif($m->status == 1)
                  <td>Selesai</td>
                  <td>
                    <form method="post" action="/homeoperator/pilih">
                      @csrf
                      <input type=hidden name="nim" value="{{$m->nim}}">
                      <input type=hidden name="status" value="2">
                      <button type="submit" class="btn btn-outline-success">Diterima</button>
                    </form>
                  </td>
                @else
                  <td>Sudah Diambil</td>
                  <td>Tuntas</td>
                @endif
                </tr>
              @endforeach
          </tbody>
        </table>
        Jumlah Data @php echo $mhs->total() @endphp
        @php echo $mhs->links() @endphp
      @endif
      </div>
      <div>
        <hr>
    </div>
    </main>
    
    @include('layouts.footer')

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      
  </body>
</html>