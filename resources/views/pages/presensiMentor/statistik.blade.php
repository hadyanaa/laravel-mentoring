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
              <h6 class="m-0 font-weight-bold text-primary">Statistik Kehadiran {{ucfirst($kelompok->nama_kelompok)}}</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
              {{-- Table Presensi --}}
              <table class="table table-striped mt-4">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">MENTEE</th>
                      <th scope="col">PERTEMUAN</th>
                      <th scope="col">HADIR</th>
                      <th scope="col">IZIN</th>
                      <th scope="col">SAKIT</th>
                      <th scope="col">% KEAKTIFAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($mentee as $key=>$item)
                    <tr>
                      <th scope="row">{{$key + 1}}</th>
                      <td>{{$item->nama_lengkap}}</td>
                      <td>{{count($presensi)}}</td>
                      <td>{{$hadir[$key]}}</td>
                      <td>{{$izin[$key]}}</td>
                      <td>{{$sakit[$key]}}</td>
                      <td>{{$keaktifan[$key]}}%</td>
                                          
                    </tr>
                    @empty
                    <tr>
                      <th scope="row">-</th>
                      <td>Tidak ada data</td>
                      <td>Tidak ada data</td>
                      <td>Tidak ada data</td>
                      <td>Tidak ada data</td>
                      <td>Tidak ada data</td>
                      <td>Tidak ada data</td>
                    </tr>        
                    @endforelse
                  </tbody>
                </table>
          </div>
      </div>
  </div>
</div>  
@endsection