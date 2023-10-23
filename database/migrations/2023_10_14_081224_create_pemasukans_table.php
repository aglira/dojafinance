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
            $table->char('id_pemasukan',5)->nullable(false)->primary();
            $table->char('id_anggota',5);
            $table->char('id_tagihan',5);
            $table->integer('nominal');
            $table->datetime('tanggal_pemasukan')->default('2023-01-01 00:00:00')->nullable(false);

            $table->foreign('id_anggota')->on('data_anggota')->references('id_anggota');
            $table->foreign('id_tagihan')->on('tagihan')->references('id_tagihan');
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
