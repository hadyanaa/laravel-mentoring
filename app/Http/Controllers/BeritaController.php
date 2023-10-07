<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tdanandeh\SweetAlert\SweetAlert;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $dataBerita = Berita::all();
        return view('pages.berita.dataBerita', ['dataBerita'=> $dataBerita]);
    }


    public function create()
    {
        return view('pages.berita.formBerita');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'sumber' => 'required',
            'konten_berita' => 'required'
        ]);

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->sumber = $request->sumber;
        $berita->konten_berita = $request->konten_berita;
        $berita->save();

        SweetAlert::success('Berhasil menambahkan Berita', 'Tambah Berita');
        return redirect('/kelola-berita');
    }

    public function show($id)
    {
        $berita = Berita::find($id);

        return view('pages.berita.detailBerita', ['berita'=> $berita]);
    }

    public function edit($id)
    {
        $berita = Berita::find($id);

        return view('pages.berita.editBerita', ['berita'=> $berita]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required', 
            'sumber' => 'required',
            'konten_berita' => 'required'
        ]);

        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->sumber = $request->sumber;
        $berita->konten_berita = $request->konten_berita;
        $berita->update();

        SweetAlert::success('Berhasil mengedit Berita', 'Edit berita');
        return redirect('/kelola-berita');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();

        SweetAlert::success('Berhasil menghapus Berita', 'Hapus berita');
        return redirect('/kelola-berita');
    }
}
