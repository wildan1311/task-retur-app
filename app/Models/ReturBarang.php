<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    use HasFactory;

    protected $table = 'retur_barang';
    protected $fillable = [
        'nomer',
    ];

    public function returBarangDetail(){
        return $this->hasMany(ReturBarangDetail::class, 'retur_barang_id', 'id');
    }
}
