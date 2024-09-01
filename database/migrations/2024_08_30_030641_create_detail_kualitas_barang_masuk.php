<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_kualitas_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_masuk_id')->nullable();
            $table->integer('banyak_barang_baik');
            $table->integer('banyak_barang_rusak');

            $table->foreign('barang_masuk_id')->references('id')->on('barang_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kualitas_barang_masuk');
    }
};
