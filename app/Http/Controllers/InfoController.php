<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tdanandeh\SweetAlert\SweetAlert;
use App\Models\Info;

class InfoController extends Controller
{
    public function index()
    {
        $dataInfo = Info::all();
        return view('pages.info.dataInfo', ['dataInfo'=> $dataInfo]);
    }


    public function create()
    {
        return view('pages.info.formInfo');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'sumber' => 'required',
            'konten_info' => 'required'
        ]);

        $info = new Info;
        $info->judul = $request->judul;
        $info->sumber = $request->sumber;
        $info->konten_info = $request->konten_info;
        $info->save();

        SweetAlert::success('Berhasil menambahkan Informasi', 'Tambah Informasi');
        return redirect('/info');
    }

    public function show($id)
    {
        $info = Info::find($id);

        return view('pages.info.detailInfo', ['info'=> $info]);
    }

    public function edit($id)
    {
        $info = Info::find($id);

        return view('pages.info.editInfo', ['info'=> $info]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required', 
            'sumber' => 'required',
            'konten_info' => 'required'
        ]);

        $info = Info::find($id);
        $info->judul = $request->judul;
        $info->sumber = $request->sumber;
        $info->konten_info = $request->konten_info;
        $info->update();

        SweetAlert::success('Berhasil mengedit Informasi', 'Edit informasi');
        return redirect('/info');
    }

    public function destroy($id)
    {
        $info = Info::find($id);
        $info->delete();

        SweetAlert::success('Berhasil menghapus Informasi', 'Hapus informasi');
        return redirect('/info');
    }
}
