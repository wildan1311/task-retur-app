<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarangDetail extends Model
{
    use HasFactory;

    protected $table = 'retur_barang_detail';
    protected $fillable = [
        'retur_barang_id',
        'barang_masuk_id',
    ];

    public function barangMasuk(){
        return $this->belongsTo(BarangMasuk::class, 'barang_masuk_id', 'id');
    }
}
