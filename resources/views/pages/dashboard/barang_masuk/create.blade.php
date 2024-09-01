{{-- 'barang_id',
        'no_nota',
        'jumlah_barang',
        'nama_suplier',
        'status', --}}
<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Tambah Barang Masuk</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Barang</label>
                    <select name="barang_id" id="" class="form-control">
                        <option value="" disabled selected>---Pilih Barang---</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">No Nota</label>
                    <input type="text" class="form-control" name="no_nota">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah_barang">
                </div>
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input type="number" class="form-control" name="harga">
                </div>
                <div class="form-group">
                    <label for="">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier">
                </div>

                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
