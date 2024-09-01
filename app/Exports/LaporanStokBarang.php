<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanStokBarang implements FromView, ShouldAutoSize
{
    public $barang;
    public function __construct(Collection $barang){
        $this->barang = $barang;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('pages.dashboard.barang_masuk.export', ['barangs' => $this->barang ?? []]);
    }
}
