<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Barang Masuk Rusak {{$namaSupplier}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.retur.laporan.create', $namaSupplier)}}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Buat Nota Retur</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Nota</th>
                        <th>Barang</th>
                        <th>Jumlah Barang Rusak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang_masuk_rusak as $barang)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $barang->no_nota }}</td>
                            <td>{{ $barang->barang->nama }}</td>
                            <td>{{ $barang->detailKualitas->banyak_barang_rusak }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
