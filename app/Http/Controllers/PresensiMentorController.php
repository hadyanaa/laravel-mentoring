<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Presensi;
use App\Models\Kelompok;
use App\Models\Status;
use App\Models\User;
use App\Models\Berita;

class PresensiMentorController extends Controller
{
    public function view()
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::where('mentor_id', $mentorId->id)->get();
        $mentor = Mentor::find($mentorId->id);
        $user = User::find($mentor->user_id);
        return view('pages.presensiMentor.kelompokMentor', ['kelompok'=> $kelompok, 'mentor' => $mentor, 'user' => $user]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
    */

    public function create($id)
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::find($id);
        if ($mentorId->id == $kelompok->mentor_id){
            $mentee = Mentee::where('kelompok_id', $kelompok->id)->get();
            return view('pages.presensiMentor.isiPresensi', ['kelompok'=> $kelompok, 'mentee'=>$mentee]);
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        };
    }

    public function show($id)
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::find($id);
        if ($mentorId->id == $kelompok->mentor_id){
            $mentee = Mentee::where('kelompok_id', $id)->get();
            $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();
    
            return view('pages.presensiMentor.presensiMentor', [
                'kelompok'=> $kelompok, 
                'presensi'=> $presensi,
                'mentee'=> $mentee
            ]);
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        }
    }

    public function stat($id)
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::find($id);
        if ($mentorId->id == $kelompok->mentor_id){
            $mentee = Mentee::where('kelompok_id', $id)->get();
            $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();
            // Code untuk mendapatkan statistik
            if (count($presensi) > 0 && count($mentee) > 0){
                foreach ($mentee as $key=>$m){
                    $hadir[$key] = count(Status::where('mentee_id', $m->id)->where('status','Hadir')->get());
                    $sakit[$key] = count(Status::where('mentee_id', $m->id)->where('status','Sakit')->get());
                    $izin[$key] = count(Status::where('mentee_id', $m->id)->where('status','Izin')->get());
                    $alpa[$key] = count(Status::where('mentee_id', $m->id)->where('status','Alpa')->get());
                    $keaktifan[$key] = number_format(($hadir[$key]*100)/count($presensi),2);
                }
        
                return view('pages.presensiMentor.statistik', [
                    'kelompok'=> $kelompok, 
                    'presensi'=> $presensi,
                    'mentee'=> $mentee,
                    'hadir' => $hadir,
                    'sakit' => $sakit,
                    'izin' => $izin,
                    'alpa' => $alpa,
                    'keaktifan' => $keaktifan
                ]);
            } else {
                return view('pages.presensiMentor.statistik', [
                    'kelompok'=> $kelompok, 
                    'presensi'=> $presensi,
                    'mentee'=> $mentee
                ]);
            }
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        }
    }

    public function edit($id)
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $presensi = Presensi::find($id);
        $kelompok = Kelompok::where('id', $presensi->kelompok_id)->first();
        if ($mentorId->id == $kelompok->mentor_id){
            $status = Status::where('presensi_id', $presensi->id)->get();
            $mentee = Mentee::where('kelompok_id', $kelompok->id)->get();
            return view('pages.presensiMentor.editPresensi', ['kelompok'=> $kelompok, 'presensi'=> $presensi, 'mentee'=> $mentee, 'status'=> $status]);
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        }
    }
}
