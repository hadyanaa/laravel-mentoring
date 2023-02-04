<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Kelompok;


class LandingController extends Controller
{
    public function dashboard($id)
    {
        $kelompok = Kelompok::all();
        $mentee = Mentee::all();
        $presensi = Presensi::all();
        $mentorall = Mentor::all();
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);

        // Dashboard Milik mentor
        $totalkelompok = Kelompok::where('mentor_id', $id)->get();
        $totalmentee = 0;
        $totalpresensi = 0;
        foreach ($totalkelompok as $tk){
            $tmentee = count(Mentee::where('kelompok_id', $tk->id)->get());
            $totalmentee += $tmentee;
            $tpresensi = count(Presensi::where('kelompok_id', $tk->id)->get());
            $totalpresensi += $tpresensi;
        }

        return view('pages.dashboard.dashboard', [
            'mentor'=> $mentor, 
            'mentorall'=> $mentorall, 
            'user'=> $user, 
            'kelompok'=> $kelompok,
            'mentee'=> $mentee,
            'presensi'=> $presensi,
            'totalkelompok' => $totalkelompok,
            'totalmentee' => $totalmentee,
            'totalpresensi' => $totalpresensi
        ]);
    }

    public function profile($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
        return view('pages.landing.profile', ['mentor'=> $mentor, 'user'=> $user]);
    }

    public function edit($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
        return view('pages.landing.editProfile', ['mentor'=> $mentor, 'user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
     
        $request->validate([
            'nama_mentor' => 'required', 
            'jenis_kelamin' => 'required',
            'asal_institusi' => 'required',
            'prodi' => 'required',
            'domisili' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)]
        ]); 

        $user->name = $request->nama_mentor;
        $user->email = $request->email;
        $user->update();

        $mentor->nama_mentor = $request->nama_mentor;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->asal_institusi = $request->asal_institusi;
        $mentor->prodi = $request->prodi;
        $mentor->domisili = $request->domisili;
        $mentor->update();

        return redirect()->action([LandingController::class, 'profile'],['id'=>$user->id]);
    }
}
