<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\User;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = Mentor::all();
        return view('pages.kelola.mentor.dataMentor', compact('mentor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kelola.mentor.formMentor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mentor' => 'required', 
            'jenis_kelamin' => 'required',
            'asal_institusi' => 'required',
            'prodi' => 'required',
            'domisili' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->nama_mentor;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $input_id_user = DB::table('users')
                ->select('id')
                ->where('email', $request->email)
                ->get();

        $mentor = new Mentor;
        $mentor->nama_mentor = $request->nama_mentor;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->asal_institusi = $request->asal_institusi;
        $mentor->prodi = $request->prodi;
        $mentor->domisili = $request->domisili;
        $mentor->user_id = $input_id_user[0]->id;
        $mentor->save();

        return redirect('/mentor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
        
        return view('pages.kelola.mentor.detailMentor', ['mentor'=> $mentor, 'user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);
        
        return view('pages.kelola.mentor.editMentor', ['mentor'=> $mentor, 'user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'password' => 'required'
        ]); 

        $user->name = $request->nama_mentor;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();

        $mentor->nama_mentor = $request->nama_mentor;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->asal_institusi = $request->asal_institusi;
        $mentor->prodi = $request->prodi;
        $mentor->domisili = $request->domisili;
        $mentor->update();

        return redirect('/mentor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $user = User::find($mentor->user_id);

        $mentor->delete();
        $user->delete();

        return redirect('/mentor');
    }
}
