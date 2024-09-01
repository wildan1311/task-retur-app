<table>
    <tr colspan="7" >
        <td colspan="7" class="text-center" align="center">LAPORAN BARANG KELUAR</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <table class="table onsive">
        <thead>
            <tr align="center">
                <th width="5px"></th>
                <th align="center">No</th>
                <th align="center">Nama Barang</th>
                <th align="center">Jumlah Barang</th>
                <th align="center">Alamat</th>
                <th align="center">Jenis</th>
                <th width="5px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangKeluar as $barang_keluar)
                <tr>
                    <td width="5px"></td>
                    <td align="center">{{$loop->iteration}}</td>
                    <td>{{@$barang_keluar->barang->nama}}</td>
                    <td align="center">{{$barang_keluar->jumlah_barang}}</td>
                    <td>{{$barang_keluar->alamat}}</td>
                    <td>{{$barang_keluar->jenis}}</td>
                    <td width="5px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</table>
