<?php

namespace App\Imports;

use App\Models\DataTest;
use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $collection)
    {
        return new DataTest([
            'noreg' => $collection[0],
            'namap' => $collection[1],
            'tplhr' => $collection[2],
            'tglhr' => $collection[3],
            'jnkel' => $collection[4],
            'stkwn' => $collection[5],
            'alamat' => $collection[6],
            'rtrw' => $collection[7],
            'keluharahan' => $collection[8],
            'kecamatan' => $collection[9],
            'kota' => $collection[10],
            'kode_pos' => $collection[11],
            'phone' => $collection[12],
            'noktp' => $collection[13],
        ]);
    }
}
