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
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{-- Table Presensi --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">MENTOR</th>
                        <th scope="col">KELOMPOK</th>
                        <th scope="col">PERSENTASE KEHADIRAN</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($presensi as $key=>$item)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$item->kelompok->mentor->nama_mentor}}</td>
                        <td>{{$item->kelompok->nama_kelompok}}</td>
                        <td>{{count($item->status)}}</td>
                        <td>
                            <a href="/presensi-kelompok">
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