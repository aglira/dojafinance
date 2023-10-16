<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTagihan extends Model
{
    use HasFactory;
    protected $table = 'jenis tagihan';
    protected $primaryKey = 'id_jenis_tagihan';
    protected $fillable = 'nama_tagihan';
    public $timestamps = 'false';

}
