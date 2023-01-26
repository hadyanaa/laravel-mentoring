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
        $presensi = Presensi::where('kelompok_id', $id)->orderByDesc('id')->get();
        return view('pages.presensiMentor.presensiMentor', ['kelompok'=> $kelompok, 'presensi'=> $presensi]);
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
