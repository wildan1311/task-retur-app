<x-dashboard-layout>
    <div class="w-100 card my-2">
        <div class="card-header">
            <h3>Barang Retur</h3>
        </div>
        <div class="card-body">
            {{-- <a href="{{route('dashboard.barang-masuk.create')}}" class="btn btn-primary">Tambah Barang Masuk</a> --}}
            <p>Barang Rusak</p>
            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th style="width: 60%">Nama Supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang_masuk_rusak as $nama_supplier => $barangs)
                        <tr class="h-1">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $nama_supplier }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('dashboard.retur.supplier.barang-rusak', $nama_supplier)}}">Detail</a>
                                <form action="{{route('dashboard.retur.laporan.create', $nama_supplier)}}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Buat Nota Retur</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="w-100 card my-2">
        <div class="card-header">
            <h3>Laporan Retur</h3>
        </div>
        <div class="card-body">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th style="width: 60%">No Retur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporanReturs as $retur)
                        <tr class="h-1">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $retur->nomer }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('dashboard.retur.laporan', $retur->id)}}">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
