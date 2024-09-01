<tr>
    <td colspan="5" align="center"> LAPORAN STOK BARANG</td>
</tr>
<tr></tr>
<table class="table ">
    <thead>
        <tr>
            <td width="5px"></td>
            <th align="center">No</th>
            <th align="center">Nama Barang</th>
            <th align="center">Stok</th>
            <td width="5px"></td>

        </tr>
    </thead>
    <tbody>
        @foreach ($barangs as $barang)
            <tr>
                <td width="5px"></td>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $barang->nama }}</td>
                <td align="center">{{ $barang->stok }}</td>
                <td width="5px"></td>
            </tr>
        @endforeach
    </tbody>
</table>
