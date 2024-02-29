<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'noreg',
        'namap',
        'tplhr',
        'tglhr',
        'jnkel',
        'stkwn',
        'alamat',
        'rtrw',
        'keluharahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'phone',
        'noktp',
    ];
}
