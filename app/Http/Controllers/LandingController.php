<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Kelompok;
use Tdanandeh\SweetAlert\SweetAlert;


class LandingController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        $kelompok = Kelompok::all();
        $mentee = Mentee::all();
        $presensi = Presensi::all();
        $mentorall = Mentor::all();
        $mentor = Mentor::where('user_id', $id)->first();
        $user = $mentor ? User::find($mentor->user_id) : null;
        // Dashboard Milik mentor
        if($user != null){
            $totalkelompok = Kelompok::where('mentor_id', $mentor->id)->get();
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
        // dashboard admin
        else {
            return view('pages.dashboard.dashboard', [
                'mentor'=> $mentor, 
                'mentorall'=> $mentorall, 
                'user'=> $user, 
                'kelompok'=> $kelompok,
                'mentee'=> $mentee,
                'presensi'=> $presensi,
            ]);
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $mentor = Mentor::where('user_id', $id)->first();
        if ($mentor) {
            $user = User::find($mentor->user_id);
            return view('pages.profile.profile', ['mentor'=> $mentor, 'user'=> $user]);
        } else {
            // dashboard admin
            $user = User::find($id);
            // $data_admin = User::where('role', 'admin');
            return view('pages.profile.profileAdmin', ['user'=> $user]);
        }
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $mentor = Mentor::where('user_id', $id)->first();
        $user = User::find($mentor->user_id);
        return view('pages.profile.editProfile', ['mentor'=> $mentor, 'user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::where('user_id', $id)->first();
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

        SweetAlert::success('Berhasil mengubah profile', 'Ubah profile');
        return redirect()->action([LandingController::class, 'profile'],['id'=>$user->id]);
    }

    public function editPassword()
    {
        return view('pages.profile.changePassword', ['user'=> Auth::user()]);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        SweetAlert::success('Berhasil mengubah password', 'Ubah password');
        return redirect()->action([LandingController::class, 'profile'],['id'=>$user->id]);
    }
}
