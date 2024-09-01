<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Barang Masuk</h3>
        </div>
        <div class="card-body">
            <div class="my-2">
                <a href="{{ route('dashboard.barang-masuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>
                <a href="{{ route('dashboard.barang-masuk', ['export' => true]) }}" class="btn btn-warning">Buat Laporan
                    Stok</a>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>No Nota</th>
                        <th>Jumlah Barang</th>
                        <th>Nama Suplier</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang_masuks as $barang_masuk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d-m-Y', strtotime($barang_masuk->created_at)) }}</td>
                            <td>{{ $barang_masuk->no_nota }}</td>
                            <td>{{ $barang_masuk->jumlah_barang }}</td>
                            <td>{{ $barang_masuk->nama_supplier }}</td>
                            <td>
                                <div class="flex flex-col">
                                    <p class="badge {{$barang_masuk->status == 'sudah_diperiksa' ? 'text-bg-primary' : 'text-bg-secondary'}}">{{ str_replace('_', " ", ($barang_masuk->status)) }}</p>
                                    @if (@$barang_masuk->detailKualitas)
                                        <p>Jumlah Barang Baik : <span
                                                class="badge rounded-pill text-bg-primary">{{ $barang_masuk->detailKualitas->banyak_barang_baik }}</span>
                                        </p>
                                        <p>Jumlah Barang Rusak: <span
                                                class="badge rounded-pill text-bg-danger">{{ $barang_masuk->detailKualitas->banyak_barang_rusak }}</span>
                                        </p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-content-center align-items-center">
                                    <button class="btn btn-success text-white">
                                        <a href="{{ route('dashboard.barang-masuk.cek', $barang_masuk->id) }}"
                                            class="text-white">Cek Kualitas</a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
