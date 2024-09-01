<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Cek Kualitas Barang Masuk</h3>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.barang-masuk.cek', $barang_masuk->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Banyak Barang Rusak</label>
                    <input type="number" class="form-control" name="banyak_barang_rusak" value="0">
                </div>
                <div class="form-group">
                    <label for="">Banyak Barang Baik</label>
                    <input type="number" class="form-control" name="banyak_barang_baik" value="0">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
