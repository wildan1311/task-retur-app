<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    public $table = 'barang_masuk';
    public $fillable = [
        'barang_id',
        'no_nota',
        'jumlah_barang',
        'nama_supplier',
        'status',
        'harga'
    ];

    public function detailKualitas(){
        return $this->hasOne(DetailKualitasBarangMasuk::class, 'barang_masuk_id', 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function returBarangDetail(){
        return $this->hasOne(ReturBarangDetail::class, 'barang_masuk_id', 'id');
    }
}
