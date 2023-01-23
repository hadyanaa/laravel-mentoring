<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Mentor;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok = Kelompok::all();
        // $dataKelompok = DB::table('kelompok')
        //     ->join('mentor', 'kelompok.mentor_id', '=', 'mentor.id')
        //     ->select('kelompok.*', 'mentor.nama_mentor')
        //     ->get();
        return view('pages.kelola.kelompok.dataKelompok', compact('kelompok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentor = Mentor::all();
        return view('pages.kelola.kelompok.formKelompok', ['mentor'=> $mentor]);
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
            'nama_kelompok' => 'required', 
            'mentor_id' => 'required',
        ]);

        $kelompok = new Kelompok;
        $kelompok->nama_kelompok = $request->nama_kelompok;
        $kelompok->mentor_id = $request->mentor_id;
        $kelompok->save();

        return redirect("/kelompok");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataKelompok = DB::table('kelompok')
        ->join('mentor', 'kelompok.mentor_id', '=', 'mentor.id')
        ->select('kelompok.*', 'mentor.nama_mentor')
        ->where('kelompok.id', '=', $id)
        ->get();

        return view('pages.kelola.kelompok.detailKelompok', ['dataKelompok'=> $dataKelompok[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelompok = Kelompok::find($id);
        $mentor = Mentor::all();

        return view('pages.kelola.kelompok.editKelompok', ['kelompok'=> $kelompok, 'mentor'=> $mentor]);
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
            'nama_kelompok' => 'required', 
            'mentor_id' => 'required',
        ]);

        $kelompok = Kelompok::find($id);
        $kelompok->nama_kelompok = $request->nama_kelompok;
        $kelompok->mentor_id = $request->mentor_id;
        $kelompok->update();

        return redirect('/kelompok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelompok = Kelompok::find($id);
        $kelompok->delete();

        return redirect('/kelompok');
    }
}
