<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Barang Keluar</h3>
        </div>
        <div class="card-body">
            <div class="my-2">
                <a href="{{route('dashboard.barang-keluar.create')}}" class="btn btn-primary">Tambah Barang Keluar</a>
                <a href="{{ request()->fullUrlWithQuery(['export' => 1]) }}" class="btn btn-warning">Buat Laporan Barang Keluar</a>
            </div>
            <form action="" class="d-flex justify-content-end align-items-center">
                <label for="" class="align-self-center me-3">Tanggal : </label>
                <input type="date" class="form-control w-25" name="date" value="{{@request()->date}}">
                <button type="submit" class="btn btn-primary ms-3 mb-0">Filter</button>
            </form>
            <table class="table ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Alamat</th>
                        <th>Jenis</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs_keluar as $barang_keluar)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{date('d-m-Y', strtotime(@$barang_keluar->created_at))}}</td>
                            <td>{{@$barang_keluar->barang->nama}}</td>
                            <td>{{$barang_keluar->jumlah_barang}}</td>
                            <td>{{$barang_keluar->alamat}}</td>
                            <td>{{$barang_keluar->jenis}}</td>
                            {{-- <td>
                                <div class="flex justify-content-center align-items-center">
                                    <button class="btn btn-success text-white" @disabled($barang_keluar->status == 'sudah_diperiksa')>
                                        <a href="{{route('dashboard.barang-masuk.cek', $barang_keluar->id)}}" class="text-white">Cek Kualitas</a>
                                    </button>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
