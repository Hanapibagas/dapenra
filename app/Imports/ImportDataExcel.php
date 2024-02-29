<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDataExcel implements ToCollection
{
    private $data;

    /**
     * Import data dari file Excel.
     *
     * @param  \Illuminate\Support\Collection  $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        // Lakukan apapun yang perlu Anda lakukan untuk mengolah data
        // Misalnya validasi, penyimpanan ke dalam array, atau apapun yang diperlukan.
        // Anda bisa menyesuaikan proses ini sesuai dengan struktur file Excel Anda.
        $data = [];

        foreach ($rows as $row) {
            // Misalnya, Anda ingin menyimpan data ke dalam bentuk array asosiatif
            $data[] = [
                'NOREG' => $row[0],
                'NAMAP' => $row[1],
                'TPLHR' => $row[2],
                'TGLHR' => $row[3],
                'JNKEL' => $row[4],
                'STKWN' => $row[5],
                'ALAMAT' => $row[6],
                'RT_RW' => $row[7],
                'KELURAHAN' => $row[8],
                'KECAMATAN' => $row[9],
                'KOTA' => $row[10],
                'KODEPOS' => $row[11],
                'PHONE' => $row[12],
                'NOKTP' => $row[13],
                'NORUTKEL' => $row[14],
                'NAMAPKEL' => $row[15],
                'JNKELKEL' => $row[16],
                'TGLHRKEL' => $row[17],
                'STKELKEL' => $row[18],
            ];
        }

        // Simpan data yang telah diproses ke dalam properti atau variabel
        $this->data = $data;
    }

    /**
     * Mendapatkan data yang telah diimpor.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
