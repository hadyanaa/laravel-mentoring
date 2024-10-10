@extends('layout.master')

@section('heading')
Presensi
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
                <a href="/presensi/export_excel" class="btn btn-primary">Export Excel</a>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                {{-- Table Presensi --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">MENTOR</th>
                        <th scope="col">KELOMPOK</th>
                        <th scope="col">MATERI</th>
                        <th scope="col">TANGGAL</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($presensi as $key=>$item)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$item->kelompok->mentor->nama_mentor}}</td>
                        <td>{{$item->kelompok->nama_kelompok}}</td>
                        <td>{{$item->materi}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>
                            <a href="/presensi/{{$item->id}}">
                                <button type="button" class="btn btn-primary btn-sm">LIHAT</button>
                            </a>
                        </td>                    
                      </tr>
                      @empty
                      <tr>
                        <th scope="row">-</th>
                        <td>Tidak ada data</td>
                        <td>Tidak ada data</td>
                        <td>Tidak ada data</td>
                        <td>Tidak ada data</td>
                        <td>
                          Tidak ada aksi
                        </td>                    
                      </tr>        
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>    
@endsection