<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Kelompok;
use App\Models\Presensi;

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

    //CRU Presensi by mentor
    Route::get('/presensi-kelompok', function(){
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::where('mentor_id', $mentorId->id)->get();
        return view('pages.presensiMentor.kelompokMentor', ['kelompok'=> $kelompok]);
    });
    
    Route::get('/presensi-kelompok/{id}/create', function($id){
        $kelompok = Kelompok::find($id);
        $mentee = Mentee::where('kelompok_id', $kelompok->id)->get();
        return view('pages.presensiMentor.isiPresensi', ['kelompok'=> $kelompok, 'mentee'=>$mentee]);
    });

    Route::get('/presensi-kelompok/{id}/lihat', function($id){
        $kelompok = Kelompok::find($id);
        $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();
        return view('pages.presensiMentor.presensiMentor', ['kelompok'=> $kelompok, 'presensi'=> $presensi]);
    });
});

// Route Frontend (sementara)
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function(){
    return view('pages.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
