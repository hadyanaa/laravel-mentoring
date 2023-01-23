<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\PresensiController;
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


Route::middleware(['auth', 'admin'])->group(function () {
    //CRUD Mentor
    Route::resource('mentor', MentorController::class);

    //CRUD Kelompok
    Route::resource('kelompok', KelompokController::class);

    //CRUD Mentee
    Route::resource('mentee', MenteeController::class);
});

Route::middleware(['auth'])->group(function () {
    //CRU Presensi
    Route::resource('presensi', PresensiController::class);

});





// Route Frontend (sementara)

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function(){
    return view('pages.dashboard');
});

Route::get('/presensi', function(){
    return view('pages.presensi.presensi');
});

Route::get('/presensi/create', function(){
    return view('pages.presensiMentor.isiPresensi');
});

Route::get('/presensi-kelompok', function(){
    return view('pages.presensi.presensiKelompok');
});

Route::get('/presensi-kegiatan', function(){
    return view('pages.presensi.presensiKegiatan');
});

// Akhir Route Frontend (sementara)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
