<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Mentee;
use App\Models\Mentor;
use DateTime;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMentee = DB::table('mentee')
        ->join('kelompok', 'mentee.kelompok_id', '=', 'kelompok.id')
        ->join('mentor', 'kelompok.mentor_id', '=', 'mentor.id')
        ->select('mentee.*', 'kelompok.nama_kelompok', 'mentor.nama_mentor')
        ->get();
        return view('pages.kelola.mentee.dataMentee', ['dataMentee'=> $dataMentee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelompok = Kelompok::all();
        return view('pages.kelola.mentee.formMentee', ['kelompok'=> $kelompok]);
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
            'nama_lengkap' => 'required', 
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'prodi' => 'required',
            'alamat_domisili' => 'required',
            'alamat_asal' => 'required',
            'akun_ig' => 'required',
            'kelompok_id' => 'required'
        ]);

        $tanggal_lahir = date_format(new DateTime($request->tgl_lahir), 'Y-m-d H:i:s');

        $mentee = new Mentee;
        $mentee->nama_lengkap = $request->nama_lengkap;
        $mentee->jenis_kelamin = $request->jenis_kelamin;
        $mentee->tempat_lahir = $request->tempat_lahir;
        $mentee->tgl_lahir = $tanggal_lahir;
        $mentee->prodi = $request->prodi;
        $mentee->no_hp = $request->no_hp;
        $mentee->alamat_domisili = $request->alamat_domisili;
        $mentee->alamat_asal = $request->alamat_asal;
        $mentee->akun_ig = $request->akun_ig;
        $mentee->kelompok_id = $request->kelompok_id;
        $mentee->save();

        return redirect('/mentee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentee = Mentee::find($id);
        $kelompok = Kelompok::find($mentee->kelompok_id);
        $mentor = Mentor::find($kelompok->mentor_id);

        return view('pages.kelola.mentee.detailMentee', ['mentee'=> $mentee, 'kelompok'=> $kelompok , 'mentor'=> $mentor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentee = Mentee::find($id);
        $kelompok = Kelompok::all();
        return view('pages.kelola.mentee.editMentee', ['kelompok'=> $kelompok, 'mentee'=> $mentee]);
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
        $request->validate([
            'nama_lengkap' => 'required', 
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'prodi' => 'required',
            'alamat_domisili' => 'required',
            'alamat_asal' => 'required',
            'akun_ig' => 'required',
            'kelompok_id' => 'required'
        ]);

        $tanggal_lahir = date_format(new DateTime($request->tgl_lahir), 'Y-m-d H:i:s');

        $mentee = Mentee::find($id);
        $mentee->nama_lengkap = $request->nama_lengkap;
        $mentee->jenis_kelamin = $request->jenis_kelamin;
        $mentee->tempat_lahir = $request->tempat_lahir;
        $mentee->tgl_lahir = $tanggal_lahir;
        $mentee->prodi = $request->prodi;
        $mentee->no_hp = $request->no_hp;
        $mentee->alamat_domisili = $request->alamat_domisili;
        $mentee->alamat_asal = $request->alamat_asal;
        $mentee->akun_ig = $request->akun_ig;
        $mentee->kelompok_id = $request->kelompok_id;
        $mentee->update();

        return redirect('/mentee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentee = Mentee::find($id);
        $mentee->delete();

        return redirect('/mentee');
    }
}
