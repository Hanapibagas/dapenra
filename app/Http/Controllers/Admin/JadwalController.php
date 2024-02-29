<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class JadwalController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $jadwal = Jadwal::query();
            return DataTables::of($jadwal)->editColumn('start_date', function ($jadwal) {
                return Carbon::parse($jadwal->start_date)->isoFormat('D MMMM Y ');
            })->editColumn('end_date', function ($jadwal) {
                return Carbon::parse($jadwal->end_date)->isoFormat('D MMMM Y ');
            })->rawColumns(['start_date', 'end_date'])->make(true);
        }

        return view('admin.jadwal.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        Jadwal::create($request->all());
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
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

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            "nama" => $request->input('nama'),
            "tanggal_mulai" => $request->input('tanggal_mulai'),
            "tanggal_akhir" => $request->input('tanggal_akhir'),
        ]);
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
    }
}
