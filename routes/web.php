<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiMentorController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\Berita;

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
    //CRUD Admin
    Route::resources([
        'mentor' => MentorController::class,
        'kelompok' => KelompokController::class,
        'mentee' => MenteeController::class,
        'kelola-berita' => BeritaController::class,
        'admin' => UserController::class,
    ]);
});

Route::middleware(['auth'])->group(function () {
    //CRU Presensi
    Route::resource('presensi', PresensiController::class);
    Route::get('/presensi/export_excel', 'PresensiController@export_excel');
    
    //CRU Presensi by mentor
    Route::get('/presensi-kelompok', [PresensiMentorController::class, 'view']);
    
    Route::get('/presensi-kelompok/{id}/create', [PresensiMentorController::class, 'create']);

    Route::get('/presensi-kelompok/{id}/lihat', [PresensiMentorController::class, 'show']);

    Route::get('/presensi-kelompok/{id}/lihat-statistik', [PresensiMentorController::class, 'stat']);

    Route::get('/presensi-kelompok/{id}/edit', [PresensiMentorController::class, 'edit']);

    // Read and update Profile
    Route::get('/profile', [LandingController::class, 'profile']);

    Route::get('/profile/edit', [LandingController::class, 'edit']);
    
    Route::put('/profile/{id}', [LandingController::class, 'update']);

    Route::get('/profile/change-password', [LandingController::class, 'editPassword']);
    
    Route::put('/profile/change-password/{id}', [LandingController::class, 'updatePassword']);
    
    Route::get('/dashboard', [LandingController::class, 'dashboard']); 
});

// Route Frontend (ditambah Berita)
Route::get('/', function () {
    return view('home',[
        "dataBerita" => Berita::all()
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
