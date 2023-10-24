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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->increments('id_pemasukan');
            // $table->char('id_anggota', 5);
            // $table->char('id_tagihan', 5);
            $table->date('tanggal');
        
            // $table->foreign('id_anggota')->references('id_anggota')->on('data_anggota');
            // $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
