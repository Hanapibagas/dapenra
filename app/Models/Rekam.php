<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
    protected $table = "rekam";

    protected $fillable = [
        'id_pegawai',
        'nik',
        'nama_penerima',
        'jenis_manfaat',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'telepon_kerabat',
        'password',
        'depan',
        'kiri',
        'kanan',
        'atas',
        'bawah',
        'dokumen',
        'status',
    ];
}
