<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Mentor;

use Tdanandeh\SweetAlert\SweetAlert;

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
        ]);

        $kelompok = new Kelompok;
        $kelompok->nama_kelompok = $request->nama_kelompok;
        $kelompok->mentor_id = $request->mentor_id;
        $kelompok->save();

        SweetAlert::success('Berhasil menambahkan kelompok', 'Tambah Kelompok');
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
        $kelompok = Kelompok::find($id);
        return view('pages.kelola.kelompok.detailKelompok', ['kelompok'=> $kelompok]);
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
        ]);

        $kelompok = Kelompok::find($id);
        $kelompok->nama_kelompok = $request->nama_kelompok;
        $kelompok->mentor_id = $request->mentor_id;
        $kelompok->update();

        SweetAlert::success('Berhasil mengedit kelompok', 'Edit Kelompok');
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
        
        SweetAlert::success('Berhasil menghapus kelompok', 'Hapus Kelompok');
        return redirect('/kelompok');
    }
}
