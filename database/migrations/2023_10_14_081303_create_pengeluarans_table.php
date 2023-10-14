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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->char('id_pengeluaran',5)->nullable(false)->primary();
            $table->char('username',50);
            $table->char('id_jenis_pengeluaran',5);
            $table->integer('nominal');
            $table->date('tanggal');
            $table->enum('disetujui',['setuju','tidak setuju']);
           
            $table->foreign('username')->on('user')->references('username');
            $table->foreign('id_jenis_pengeluaran')->on('jenis_pengeluaran')->references('id_jenis_pengeluaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
