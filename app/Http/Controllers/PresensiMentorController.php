<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Presensi;
use App\Models\Kelompok;
use App\Models\Status;

class PresensiMentorController extends Controller
{
    public function view()
    {
        $userId = Auth::user()->id;
        $mentorId = Mentor::where('user_id', $userId)->first();
        $kelompok = Kelompok::where('mentor_id', $mentorId->id)->get();
        return view('pages.presensiMentor.kelompokMentor', ['kelompok'=> $kelompok]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
    */

    public function create($id)
    {
        $kelompok = Kelompok::find($id);
        $mentee = Mentee::where('kelompok_id', $kelompok->id)->get();
        return view('pages.presensiMentor.isiPresensi', ['kelompok'=> $kelompok, 'mentee'=>$mentee]);
    }

    public function show($id)
    {
        $kelompok = Kelompok::find($id);
        $mentee = Mentee::where('kelompok_id', $id)->get();
        $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();

        return view('pages.presensiMentor.presensiMentor', [
            'kelompok'=> $kelompok, 
            'presensi'=> $presensi,
            'mentee'=> $mentee
        ]);
    }

    public function stat($id)
    {
        $kelompok = Kelompok::find($id);
        $mentee = Mentee::where('kelompok_id', $id)->get();
        $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();

        // Code untuk mendapatkan statistik
        foreach ($mentee as $key=>$m){
            $hadir[$key] = count(Status::where('mentee_id', $m->id)->where('status','Hadir')->get());
            $sakit[$key] = count(Status::where('mentee_id', $m->id)->where('status','Sakit')->get());
            $izin[$key] = count(Status::where('mentee_id', $m->id)->where('status','Izin')->get());
            $keaktifan[$key] = number_format(($hadir[$key]*100)/count($presensi),2);
        }

        return view('pages.presensiMentor.statistik', [
            'kelompok'=> $kelompok, 
            'presensi'=> $presensi,
            'mentee'=> $mentee,
            'hadir' => $hadir,
            'sakit' => $sakit,
            'izin' => $izin,
            'keaktifan' => $keaktifan
        ]);
    }

    public function edit($id)
    {
        $presensi = Presensi::find($id);
        $kelompok = Kelompok::where('id', $presensi->kelompok_id)->first();
        $status = Status::where('presensi_id', $presensi->id)->get();
        $mentee = Mentee::where('kelompok_id', $kelompok->id)->get();
        return view('pages.presensiMentor.editPresensi', ['kelompok'=> $kelompok, 'presensi'=> $presensi, 'mentee'=> $mentee, 'status'=> $status]);
    }
}
