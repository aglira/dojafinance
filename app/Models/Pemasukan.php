<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_anggota'; //
    protected $fillable = ['id_anggota', 'id_tagihan', 'tanggal_pemasukan', 'nominal'];
    public $timestamps = false;
}
