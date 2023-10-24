<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggota extends Model
{
    use HasFactory;
    protected $table = 'data_anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['username', 'tinggi badan', 'berat badan', 'prestasi', 'foto'];
    public $timestamps = false;
}
