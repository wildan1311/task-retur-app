<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKualitasBarangMasuk extends Model
{
    use HasFactory;
    public $table = 'detail_kualitas_barang_masuk';
    public $fillable = [
        'barang_masuk_id',
        'banyak_barang_baik',
        'banyak_barang_rusak',
    ];
}
