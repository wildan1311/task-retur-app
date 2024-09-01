<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangKeluarExport implements FromView, ShouldAutoSize
{
    public $barangKeluar;
    public function __construct(Collection $barangKeluar){
        $this->barangKeluar = $barangKeluar??[];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('pages.dashboard.barang_keluar.export', [
            'barangKeluar' => $this->barangKeluar??[]
        ]);
    }
}
