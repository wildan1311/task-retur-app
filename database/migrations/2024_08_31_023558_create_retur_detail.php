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
        Schema::create('retur_barang_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('retur_barang_id');
            $table->unsignedBigInteger('barang_masuk_id');

            $table->foreign('retur_barang_id')->references('id')->on('retur_barang');
            $table->foreign('barang_masuk_id')->references('id')->on('barang_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur_barang_detail');
    }
};
