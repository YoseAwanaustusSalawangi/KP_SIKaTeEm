
    <div class="form-group">
        <p align="center"><b>DATA KTM MAHASISWA UKDW</b></p>
        <br>
        <table class="table table-static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Status KTM</th>
            </tr>
            @foreach($dtCetakmhs as $item)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td align="center">{{ $item->nim }}</td>
                    <td>{{ $item->namaMhs }}</td>
                    <td align="center">{{ $item->prodi }}</td>
                    @if($item->status == 0)
                        <td align="center">Sedang Diproses</td>
                    @elseif($item->status == 1)
                        <td align="center">Selesai</td>
                    @elseif($item->status == 2)
                        <td align="center">Sudah Diambil</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>

    <!-- <script type="text/javascript">
        window.print();
    </script> -->
