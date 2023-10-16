<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'id_tagihan';
    protected $primaryKey = 'id_jenis tagihan';
    protected $fillable = ['tahun', 'bulan', 'nominal'];
    public $timestamps = 'false';

}
