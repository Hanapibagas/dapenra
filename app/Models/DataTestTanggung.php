<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTestTanggung extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pegawai',
        'norut_kel',
        'namap_kel',
        'jnkel_kel',
        'tgl_lhr_kel',
        'stkel_kel'
    ];
}
