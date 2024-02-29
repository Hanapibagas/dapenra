<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tertanggung extends Model
{
    use HasFactory;
    protected $table = "pegawai";

    protected $fillable = [
        'id_pegawai',
        'nama_tertanggung',
        'jenis_manfaat',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'telepon_kerabat'
    ];
}
