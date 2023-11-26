<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logging extends Model
{
    use HasFactory;
    protected $table = 'logging';
    protected $fillable = ['log'];
    protected $primaryKey = 'id_log'; 
    public $timestamps = false;
}
