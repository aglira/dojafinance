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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id_tagihan');
            $table->char('id_jenis_tagihan', 5);
            $table->date('tanggal');
            $table->date('bulan');
            $table->integer('nominal');
        
            $table->foreign('id_jenis_tagihan')->references('id_jenis_tagihan')->on('jenis_tagihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
