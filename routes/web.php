<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\RegistrasiController;
use App\Http\Controllers\Admin\OtentikasiController;
use App\Http\Controllers\Admin\ManagementStructureController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Admin\WelcomeSpeechController;
use App\Http\Controllers\User\AboutController as UserAboutController;
use App\Http\Controllers\User\ActivityController as UserActivityController;
use App\Http\Controllers\User\JadwalController as UserJadwalController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\ManagementStructureController as UserManagementStructureController;
use App\Http\Controllers\User\TourController as UserTourController;
use App\Http\Controllers\User\UmkmController as UserUmkmController;
use App\Http\Controllers\User\VisionMissionController as UserVisionMissionController;
use App\Http\Controllers\User\WelcomeSpeechController as UserWelcomeSpeechController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.master');
// });

// about
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // about
    Route::resource('abouts', AboutController::class);

    // management Structure
    Route::post('managementstructures/update', [ManagementStructureController::class, 'update'])->name('update-management-structure');
    Route::resource('managementstructures', ManagementStructureController::class);

    // vission mission
    Route::resource('vissionmissions', VisionMissionController::class);

    // welcome speech
    Route::post('welcomespeech/update', [WelcomeSpeechController::class, 'update'])->name('update-welcome-speech');
    Route::resource('welcomespeech', WelcomeSpeechController::class);

    // activity
    Route::resource('activities', ActivityController::class);
    Route::post('activities/update', [ActivityController::class, 'update'])->name('update-activity');

    // agenda
    Route::resource('agenda', AgendaController::class);

    // jadwal
    Route::resource('jadwal', JadwalController::class);

    Route::resource('informasi', InformasiController::class);

    // pegawai
    Route::resource('pegawai', PegawaiController::class);
    Route::post('importdata', [PegawaiController::class, 'importdata'])->name('importdata');
    //Route::post("pegawai/importdata", "Admin\Pegawai@create")->name("admin-users-permission-create");
    // registrasi
    Route::resource('registrasi', RegistrasiController::class);

    // otentikasi
    Route::resource('otentikasi', OtentikasiController::class);

    // otentikasi
    // Route::resource('informasi', [InformasiControlle::class]);

    //  tour
    Route::resource('tour', TourController::class);
    Route::post('tour/update', [TourController::class, 'update'])->name('update-tour');

    // umkm
    Route::resource('umkm', UmkmController::class);
    Route::post('umkm/update', [UmkmController::class, 'update'])->name('update-umkm');
});


Route::prefix('user')->name('user.')->group(function () {
    // about
    Route::resource('abouts', UserAboutController::class);

    // welcome speech
    Route::resource('welcomespeech', UserWelcomeSpeechController::class);

    // vission mission
    Route::resource('vissionmissions', UserVisionMissionController::class);

    // management Structure
    Route::get('managementstructures', [UserManagementStructureController::class, 'index'])->name('index-management-structure');


    // management Structure
    Route::get('activity', [UserActivityController::class, 'index'])->name('index-activity');
    Route::get('detail-activity/{slug}', [UserActivityController::class, 'detailActivity'])->name('detail-activity');

    // contact
    Route::get('contact', [ContactController::class, 'index'])->name('index-contact');

    // agenda
    Route::get('agenda', [UserAgendaController::class, 'index'])->name('index-agenda');

    // tour
    Route::get('tour', [UserTourController::class, 'index'])->name('index-tour');
    Route::get('detail-tour/{id}', [UserTourController::class, 'detailTour'])->name('detail-tour');

    // umkm
    Route::get('umkm', [UserUmkmController::class, 'index'])->name('index-umkm');
    Route::get('umkm/{id}', [UserUmkmController::class, 'detailUmkm'])->name('detail-umkm');
});

// landing page
Route::get('/', [LandingPageController::class, 'index'])->name('index-activity');

Auth::routes();

Route::match(["GET", "POST"], '/register', function () {
    return redirect('/login');
})->name('register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
