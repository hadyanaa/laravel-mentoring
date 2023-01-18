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

        $dataKelompok = DB::table('kelompok')
            ->join('mentor', 'kelompok.mentor_id', '=', 'mentor.id')
            ->select('kelompok.*', 'mentor.nama_mentor')
            ->get();
        // $kelompok = Kelompok::all();
        // $mentor = Mentor::all();
        return view('pages.kelola.kelompok.dataKelompok', ['dataKelompok'=> $dataKelompok]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
