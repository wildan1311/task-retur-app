<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\ReturBarang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class ReturController extends Controller
{
    public function index(){
        $barang_masuk_rusak = BarangMasuk::with(['detailKualitas', 'barang'])->whereHas('detailKualitas', function($detailKualitas){
            $detailKualitas->where('banyak_barang_rusak', '>', '0');
        })->whereDoesntHave('returBarangDetail')->get()->groupBy('nama_supplier');

        $laporanReturs = ReturBarang::all();
        return view('pages.dashboard.retur.index', compact('barang_masuk_rusak','laporanReturs'));
    }

    public function detailBarangRusak($namaSupplier){
        $barang_masuk_rusak = BarangMasuk::with(['detailKualitas', 'barang'])->whereHas('detailKualitas', function($detailKualitas){
                                    $detailKualitas->where('banyak_barang_rusak', '>', '0');
                                })
                                ->whereDoesntHave('returBarangDetail')
                                ->where('nama_supplier', $namaSupplier)
                                ->get();
        FacadesView::share('namaSupplier', $namaSupplier);
        return view('pages.dashboard.retur.detail-barang-rusak', compact('barang_masuk_rusak'));
    }

    public function createRetur($namaSupplier){
        $barang_masuk_rusak = BarangMasuk::with(['detailKualitas', 'barang'])->whereHas('detailKualitas', function($detailKualitas){
            $detailKualitas->where('banyak_barang_rusak', '>', '0');
        })->whereDoesntHave('returBarangDetail')->where('nama_supplier', $namaSupplier)->get();

        $laporanReturBarang = ReturBarang::create([
            'nomer' => $this->createNomerRetur()
        ]);

        foreach($barang_masuk_rusak as $barang){
            $laporanReturBarang->returBarangDetail()->create([
                'barang_masuk_id' => $barang->id,
            ]);
        }

        return redirect()->route('dashboard.retur.supplier')->with('status', 'Berhasil Membuat Retur');
    }

    public function detailLaporanRetur($id){
        $returBarang = ReturBarang::with('returBarangDetail.barangMasuk.barang')->find($id);

        return view('pages.dashboard.retur.detail-retur', compact('returBarang'));
    }

    public function createNomerRetur(){
        $nomer = 'RTR' . date('ymdhis');
        return $nomer;
    }
}
