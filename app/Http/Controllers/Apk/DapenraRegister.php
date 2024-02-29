<?php

namespace App\Http\Controllers\Apk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Rekam;
use App\Models\Pegawai;



class DapenraRegister extends Controller
{
    public function index(Request $request)
    {
        echo "berhasil";
    }

    public function registerpensiun(Request $request){
      // Validasi request jika diperlukan

      $request->validate([
          //'id_pegawai' => 'required',
          'nik' => 'required',
          'nama_penerima' => 'required',
          //'jenis_manfaat' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'telepon_kerabat' => 'required',
          'password' => 'required',
          'dokumen' => 'required',
          'status' => 'required',
      ]);

      // Simpan data ke database atau lakukan tindakan lain sesuai kebutuhan
      // Misalnya, simpan data ke tabel 'posts'

      $users = Pegawai::where('nik', $request->input('nik'))->get();

      $count = $users->count();
      if($count > 0){

          $idpegawai = $users[0]->id;
          if ($request->file('dokumen')) {
              $dokumen = $request->file('dokumen')->store('dokumen/rekam', 'public');
          }
          $password = SHA1($request->input('password'));
          $post = Rekam::create([
            'id_pegawai' => $idpegawai,
            'nik' => $request->input('nik'),
            'nama_penerima' => $request->input('nama_penerima'),
            //'jenis_manfaat' => $request->input('jenis_manfaat'),
            'jenis_manfaat' => 0,
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'telepon_kerabat' => $request->input('telepon_kerabat'),
            'password' => $password,
            'dokumen' => $dokumen,
            'status' => $request->input('status'),

          ]);
          // Berikan respons sukses
          return response()->json('Sukses Menyimpan Data');
        

      }else{
        return response()->json('NIK Tidak Ditemukan');
      }


    }

    public function registertertanggung(Request $request){

    }

    public function ceknik(){

    }


}
