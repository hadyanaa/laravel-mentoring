<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Mentor;
use App\Models\User;

class LandingController extends Controller
{
    public function dashboard($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
        return view('pages.dashboard', ['mentor'=> $mentor, 'user'=> $user]);
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
