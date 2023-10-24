<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_anggota', function (Blueprint $table) {
            $table->integer('id_anggota')->autoIncrement() ;
            $table->char('username', 50);
            $table->string('nama_anggota', 50);
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->text('prestasi');
            $table->string('foto', 255);
        
            $table->foreign('username')->references('username')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anggota');
    }
};
