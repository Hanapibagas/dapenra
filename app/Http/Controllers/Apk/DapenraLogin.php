<?php

namespace App\Http\Controllers\Apk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Rekam;


class DapenraLogin extends Controller
{
    public function index(Request $request)
    {
        echo "berhasil";
    }

    public function login(Request $request){
      //echo "berhasil lagi";

      
      /*
        $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials)) {
             $token = auth()->user()->createToken('DapenraOT')->accessToken;
             return response()->json(['token' => $token], 200);
         } else {
             return response()->json(['error' => 'Unauthorized'], 401);
         }*/
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
