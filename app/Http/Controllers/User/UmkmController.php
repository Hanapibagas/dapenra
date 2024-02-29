<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::paginate(6);
        return view('user.umkm', compact('umkm'));
    }

    public function detailUmkm($id)
    {
        $detailUmkm = Umkm::where('id', $id)->first();
        return view('user.detail-umkm', compact('detailUmkm'));
    }
}
