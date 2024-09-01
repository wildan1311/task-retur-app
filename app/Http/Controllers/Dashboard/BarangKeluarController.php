<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\BarangKeluarExport;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangKeluar::query();

        if ($request->date) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $barangs_keluar = $query->get();

        if ($request->has('export')) {
            return Excel::download(new BarangKeluarExport($barangs_keluar), 'Barang Keluar.xlsx');
        }

        return view('pages.dashboard.barang_keluar.index', compact('barangs_keluar'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('pages.dashboard.barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_barang' => 'required',
            'alamat' => 'required',
            'barang_id' => 'required',
            'jenis' => 'required',
        ]);
        BarangKeluar::create($request->all());
        if($request->jenis == 'barang_terjual'){
            $barang = Barang::find($request->barang_id);
            $barang->stok -= $request->jumlah_barang;
            $barang->save();
        }
        return redirect()->route('dashboard.barang-keluar')->with('status', 'Data Berhasil Ditambah');
    }
}
