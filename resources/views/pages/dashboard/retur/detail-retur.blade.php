<x-dashboard-layout>
    <div class="bg-white w-100 p-4 border-2">
        <div class="text-center">
            <h1>BUKTI PELAPORAN <br> NOTA RETUR</h1>
            <p class="mb-0">No. {{ $returBarang->nomer }}</p>
            <p>Tanggal {{ $returBarang->created_at }}</p>
        </div>
        <div class="card w-100 shadow-none">
            <div class="card-header bg-secondary text-white fw-bolder">
                Penjual
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>Nama : </td>
                        <td>{{ $returBarang->returBarangDetail->first()->barangMasuk->nama_supplier }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-header bg-secondary text-white fw-bolder">
                Pembeli
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>Nama : </td>
                        <td>Toko Sukamaju</td>
                    </tr>
                </table>
            </div>
            <div class="card-header bg-secondary text-white fw-bolder">

                Barang Yang Diretur

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Nota</th>
                            <th>Nama Barang</th>
                            <th>Alasan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returBarang->returBarangDetail as $returBarangDetail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($returBarangDetail->barangMasuk->no_nota) }}</td>
                                <td>{{ ucfirst($returBarangDetail->barangMasuk->barang->nama) }}</td>
                                <td>Rusak</td>
                                <td>{{ $returBarangDetail->barangMasuk->jumlah_barang }}</td>
                                <td>Rp.{{ number_format($returBarangDetail->barangMasuk->harga, 2) }}</td>
                                <td>Rp.{{ number_format($returBarangDetail->barangMasuk->harga * $returBarangDetail->barangMasuk->jumlah_barang, 2) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-end">Total</td>
                            <td>Rp.{{ number_format($returBarang->returBarangDetail->sum(fn($barangDetail) => $barangDetail->barangMasuk->harga * $barangDetail->barangMasuk->jumlah_barang), 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end not-print">
            <a class="btn btn-primary btn-lg px-5 text-end not-print" onclick="window.print()">Cetak</a>
        </div>
    </div>
</x-dashboard-layout>
