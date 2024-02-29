<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class OtentikasiController extends Controller
{
    public function index(Request $request)
    {


        return view('admin.otentikasi.index');
    }


}
