<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apk\DapenraLogin;
use App\Http\Controllers\apk\DapenraRegister;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('logindapenra', DapenraLogin::class);
Route::get('checklogin', [DapenraLogin::class, 'login']);
Route::post('ceknik', [DapenraRegister::class, 'ceknik']);
Route::post('rpensiun', [DapenraRegister::class, 'registerpensiun']);
Route::post('rtertanggung', [DapenraRegister::class, 'registertertanggung']);

//Route::resource('registrasidapenra', DapenraRegister::class);
//Route::resource('pegawaidapenra', DapenraRegister::class);
//Route::resource('otentikasidapenra', DapenraRegister::class);
