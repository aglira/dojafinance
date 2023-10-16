<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    use HasFactory;
    protected $table = 'jenis pengeluaran';
    protected $primaryKey = 'id_jenis_pengeluaran';
    protected $fillable = 'nama_jenis';
    public $timestamps = 'false';
}
