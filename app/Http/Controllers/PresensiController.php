<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;
use App\Models\Status;
use App\Models\Mentee;
use App\Models\Berita;
use DateTime;
use Tdanandeh\SweetAlert\SweetAlert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PresensiExport;

class PresensiController extends Controller
{
    public function index()
    {
        if (Auth::user()->email == "admin@bkpk.com"){
            $presensi = Presensi::all();
            return view('pages.presensi.presensi', compact('presensi'));
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        }
    }

    // export excel 
    public function export_excel()
	{
		return Excel::download(new PresensiExport, 'presensi.xlsx');
	}

    public function create()
    {
        // $userId = Auth::user()->id;
        // $mentorId = Mentor::where('user_id', $userId)->first();
        // $kelompok = Kelompok::where('mentor_id', $mentorId->id)->get();
        // return view('pages.presensiMentor.isiPresensi', ['kelompok'=> $kelompok]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'materi' => 'required', 
            'tanggal' => 'required',
            'kelompok_id' => 'required',
            'mentee_id' => 'required',
            'status' => 'required'
        ]);

        $tgl = date_format(new DateTime($request->tanggal), 'Y-m-d H:i:s');

        $presensi = new Presensi;
        $presensi->materi = $request->materi;
        $presensi->tanggal = $tgl;
        $presensi->kelompok_id = $request->kelompok_id;
        $presensi->save();


        $mentee_id = $request->mentee_id;
        $status = $request->status;
        for ($i=0; $i<count($mentee_id);$i++)
        {
            $dataStatus = [
                'mentee_id'=>$mentee_id[$i],
                'status'=>$status[$i]
            ];

            $statusHadir = new Status;
            $statusHadir->mentee_id = $dataStatus['mentee_id'];
            $statusHadir->status = $dataStatus['status'];
            $statusHadir->presensi_id = $presensi->id;
            $statusHadir->save();
        }
        
        SweetAlert::success('Berhasil menambahkan presensi', 'Tambah presensi');
        return redirect('/presensi-kelompok');
    }

    public function show($id)
    {
        if (Auth::user()->email == "admin@bkpk.com"){
            $presensi = Presensi::find($id);
            $mentee = Mentee::where('kelompok_id', $presensi->kelompok->id)->get();
            return view('pages.presensiMentor.detailPresensi', ['presensi'=> $presensi, 'mentee'=> $mentee]);
        } else {
            return view('home', [
                "dataBerita" => Berita::all()
            ]);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'materi' => 'required', 
            'tanggal' => 'required',
            'kelompok_id' => 'required',
            'mentee_id' => 'required',
            'status' => 'required'
        ]);

        $tgl = date_format(new DateTime($request->tanggal), 'Y-m-d H:i:s');

        $presensi = Presensi::find($id);
        $presensi->materi = $request->materi;
        $presensi->tanggal = $tgl;
        $presensi->kelompok_id = $request->kelompok_id;
        $presensi->update();

        $mentee_id = $request->mentee_id;
        $status = $request->status;
        for ($i=0; $i<count($mentee_id);$i++)
        {
            $dataStatus = [
                'mentee_id'=>$mentee_id[$i],
                'status'=>$status[$i]
            ];
            $statusHadir = Status::where('mentee_id', $dataStatus['mentee_id'])->where('presensi_id', $presensi->id);
            $statusHadir->update(['status'=>$status[$i]]);
        }
        
        SweetAlert::success('Berhasil mengedit presensi', 'Edit presensi');
        return redirect('/presensi-kelompok');
    }

    public function destroy($id)
    {
        //
    }
}
