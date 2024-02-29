<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class RegistrasiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $registrasi = Rekam::query();

            return DataTables::of($registrasi)->editColumn('tanggal_lahir', function ($registrasi) {
                return Carbon::parse($registrasi->tanggal_lahir)->isoFormat('D MMMM Y ');
            })->editColumn('status', function ($registrasi) {
                if($registrasi->status == 1){
                  return "Belum Di Verifikasi";
                }else if($registrasi->status == 2){
                  return "Telah Di Verifikasi (Mulai Rekam)";
                }else{
                  return "Selesai Rekam";
                }
            })->editColumn('jenis_manfaat', function ($registrasi) {
                if($registrasi->jenis_manfaat == 0){
                  return "Pensiunan";
                }else if($registrasi->status == 1){
                  return "Janda";
                }else if($registrasi->status == 2){
                  return "Duda";
                }else{
                  return "Anak";
                }
            })->rawColumns(['tanggal_lahir','status','jenis_manfaat'])->make(true);
        }

        return view('admin.registrasi.index');
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
        $registrasi = Pegawai::findOrFail($id);
        return response()->json([
            "data" => $registrasi,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $registrasi = Pegawai::findOrFail($id);

        $registrasi->update([
            "nama" => $request->input('nama'),
            "tanggal_mulai" => $request->input('tanggal_mulai'),
            "tanggal_akhir" => $request->input('tanggal_akhir'),
        ]);
    }

    public function destroy($id)
    {
        $registrasi = Pegawai::findOrFail($id);
        $registrasi->delete();
    }
}
