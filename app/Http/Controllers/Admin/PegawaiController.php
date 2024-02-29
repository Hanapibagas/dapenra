<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PegawaiImport;
use App\Models\DataTest;
use App\Models\DataTestTanggung;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $pegawai = DataTest::query();

            return DataTables::of($pegawai)->editColumn('tanggal_lahir', function ($pegawai) {
                return Carbon::parse($pegawai->tanggal_lahir)->isoFormat('D MMMM Y ');
            })->editColumn('tanggal_lahir_p', function ($pegawai) {
                return Carbon::parse($pegawai->tanggal_lahir_p)->isoFormat('D MMMM Y ');
            })->editColumn('status_p', function ($pegawai) {
                if ($pegawai->status_p == 1) {
                    return "Istri";
                } else {
                    return "Anak";
                }
            })->rawColumns(['tanggal_lahir', 'tanggal_lahir_p', 'status_p'])->make(true);
        }

        return view('admin.pegawai.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        Pegawai::create($request->all());
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json([
            "data" => $pegawai,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            "nama" => $request->input('nama'),
            "tanggal_mulai" => $request->input('tanggal_mulai'),
            "tanggal_akhir" => $request->input('tanggal_akhir'),
        ]);
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
    }

    public function show()
    {
        //$pegawai = Pegawai::limit(6);
        //echo json_encode($pegawai);
    }

    public function importdata(Request $request)
    {
        $file = $request->file('name');

        $tempFilePath = $file->getPathname();
        $rows = Excel::toCollection([], $tempFilePath)[0];

        $result = [];
        $result1 = [];
        $header = null;

        foreach ($rows as $index => $row) {
            if (!$header) {
                $header = $row->toArray();
                continue;
            }
            $result1[] = [
                'norut_kel' => $row[14],
                'namap_kel' => $row[15],
                'jnkel_kel' => $row[16],
                'tgl_lhr_kel' => $row[17],
                'stkel_kel' => $row[18],
            ];

            $key = null;
            foreach ($row as $index => $value) {
                if (strcasecmp($header[$index], 'NOKTP') === 0) {
                    $key = $value;
                    break;
                }
            }
            if (!$key) {
                continue;
            }
            if (!isset($result[$key])) {
                $result[$key] = $row->toArray();
            }
        }

        $resultCount = count($result);
        if (count($result1) < $resultCount) {
            $result1 = array_merge($result1, array_fill(0, $resultCount - count($result1), null));
        } elseif (count($result1) > $resultCount) {
            $result1 = array_slice($result1, 0, $resultCount);
        }

        $insertedData = [];
        foreach ($result as $key => $data) {
            $record = new DataTest();
            $record->noktp = $key;
            $record->noreg = $data['0'];
            $record->namap = $data['1'];
            $record->tplhr = $data['2'];
            $record->tglhr = $data['3'];
            $record->jnkel = $data['4'];
            $record->stkwn = $data['5'];
            $record->alamat = $data['6'];
            $record->rtrw = $data['7'];
            $record->keluharahan = $data['8'];
            $record->kecamatan = $data['9'];
            $record->kota = $data['10'];
            $record->kode_pos = $data['11'];
            $record->phone = $data['12'];
            $record->save();

            $insertedData[] = $record->id;
        }

        $dataToInsert = [];
        foreach ($result1 as $key => $data) {
            $dataToInsert[] = [
                'id_pegawai' => $insertedData[$key],
                'norut_kel' => $data['norut_kel'],
                'namap_kel' => $data['namap_kel'],
                'jnkel_kel' => $data['jnkel_kel'],
                'tgl_lhr_kel' => $data['tgl_lhr_kel'],
                'stkel_kel' => $data['stkel_kel'],
            ];
        }

        DataTestTanggung::insert($dataToInsert);

        return response()->json($dataToInsert);
    }
}
