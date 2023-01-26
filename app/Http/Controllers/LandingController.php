<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\User;

class LandingController extends Controller
{
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
}
