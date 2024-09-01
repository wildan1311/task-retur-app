<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\LaporanStokBarang;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\DetailKualitasBarangMasuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangMasukController extends Controller
{
    public function index(Request $request){
        $barang_masuks = BarangMasuk::orderByDesc('created_at')->get();
        if($request->has('export')){
            $barangs = Barang::all();
            return Excel::download(new LaporanStokBarang($barangs), 'laporan-stok-barang.xlsx');
        }
        return view('pages.dashboard.barang_masuk.index', compact('barang_masuks'));
    }
    public function create(){
        $barangs = Barang::all();
        return view('pages.dashboard.barang_masuk.create', compact('barangs'));
    }
    public function store(Request $request){
        $request->validate([
            'jumlah_barang' => 'required',
            'no_nota' => 'required',
            'barang_id' => 'required',
            'nama_supplier' => 'required',
        ]);
        BarangMasuk::create($request->all());
        return redirect()->route('dashboard.barang-masuk')->with('status', 'Data Berhasil Ditambah');
    }
    public function cekKualitas(Request $request, $id){
        $barang_masuk = BarangMasuk::find($id);
        return view('pages.dashboard.barang_masuk.cek-kualitas', compact('barang_masuk'));
    }

    public function cekKualitasStore(Request $request, $id){
        $request->validate([
            'banyak_barang_rusak' => 'required|integer',
            'banyak_barang_baik' => 'required|integer',
        ]);

        $barangMasuk = BarangMasuk::find($id);
        if($request->banyak_barang_rusak + $request->banyak_barang_baik != $barangMasuk->jumlah_barang){
            return redirect()->back()->with(['status' => 'failed', 'message' => 'Barang belum dicek secara keseluruhan']);
        }

        DetailKualitasBarangMasuk::create([
            'barang_masuk_id' => $id,
            'banyak_barang_rusak' => $request->banyak_barang_rusak,
            'banyak_barang_baik' => $request->banyak_barang_baik,
        ]);

        $barangMasuk->update(['status' => 'sudah_diperiksa']);
        $barang = Barang::find($barangMasuk->barang_id);

        $stok = $barang->stok + $request->banyak_barang_baik;
        $barang->update(['stok' => $stok]);

        return redirect()->route('dashboard.barang-masuk')->with('status', 'Berhasil Mengecek Barang');
    }
}
