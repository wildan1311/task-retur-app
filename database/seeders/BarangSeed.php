<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama' => "Beras",
                'stok' => 10
            ],
            [
                'nama' => "Minyak",
                'stok' => 10
            ],
            [
                'nama' => "Gula",
                'stok' => 10
            ],
            [
                'nama' => "Garam",
                'stok' => 10
            ],
            [
                'nama' => "Telur",
                'stok' => 10
            ],
        ]);
    }
}
