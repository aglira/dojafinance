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
            $table->string('id_anggota', 255);
            $table->string('id_tagihan', 255);
            $table->date('tanggal_pemasukan');
            $table->string('nominal', 255);
        
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
