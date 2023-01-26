<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Status;
use App\Models\Mentee;
use DateTime;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presensi = Presensi::all();
        return view('pages.presensi.presensi', compact('presensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $userId = Auth::user()->id;
        // $mentorId = Mentor::where('user_id', $userId)->first();
        // $kelompok = Kelompok::where('mentor_id', $mentorId->id)->get();
        // return view('pages.presensiMentor.isiPresensi', ['kelompok'=> $kelompok]);
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
        
        return redirect('/presensi-kelompok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presensi = Presensi::find($id);
        $mentee = Mentee::where('kelompok_id', $presensi->kelompok->id)->get();
        return view('pages.presensiMentor.detailPresensi', ['presensi'=> $presensi, 'mentee'=> $mentee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

            $statusHadir = Status::where('mentee_id', $dataStatus['mentee_id']);
            // $statusHadir->mentee_id = $dataStatus['mentee_id'];
            // $statusHadir->status = $dataStatus['status'];
            // $statusHadir->presensi_id = $presensi->id;
            $statusHadir->update(['status'=>$status[$i]]);
        }
        
        return redirect('/presensi-kelompok');
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
