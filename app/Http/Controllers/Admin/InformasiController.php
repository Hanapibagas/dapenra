<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTest;
use App\Models\Informasi;
use App\Models\Jadwal;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class InformasiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $jadwal = Informasi::query();
            return DataTables::of($jadwal)->editColumn('start_date', function ($jadwal) {
                return Carbon::parse($jadwal->start_date)->isoFormat('D MMMM Y ');
            })->editColumn('end_date', function ($jadwal) {
                return Carbon::parse($jadwal->end_date)->isoFormat('D MMMM Y ');
            })->rawColumns(['start_date', 'end_date'])->make(true);
        }

        $pegawai = DataTest::all();

        // return response()->json($pegawai);
        return view('admin.informasi.index', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pegawai' => 'required|string',
            'tanggal_waktu' => 'required',
            'pesan' => 'required',
        ]);

        Informasi::create($request->all());
        return redirect()->back();
    }

    public function edit($id)
    {
        $jadwal = Informasi::findOrFail($id);
        return response()->json([
            "data" => $jadwal,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $jadwal = Informasi::findOrFail($id);

        $jadwal->update([
            "id_pegawai" => $request->input('id_pegawai'),
            "tanggal_waktu" => $request->input('tanggal_waktu'),
            "pesan" => $request->input('pesan'),
        ]);
    }

    public function destroy($id)
    {
        $jadwal = Informasi::findOrFail($id);
        $jadwal->delete();
    }
}
