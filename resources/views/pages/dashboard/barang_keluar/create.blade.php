{{-- barang_id	bigint(20) unsigned
jumlah_barang	int(11)
alamat	text
jenis	varchar(255)
created_at	timestamp NULL
updated_at	timestamp NULL --}}
<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Tambah Barang Keluar</h3>
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
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah_barang">
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <div class="ms-3">
                        <input type="radio" name="jenis" id="jenis" value="retur"> Retur
                    </div>
                    <div class="ms-3">
                        <input type="radio" name="jenis" id="jenis" value="barang_terjual"> Barang Terjual
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
