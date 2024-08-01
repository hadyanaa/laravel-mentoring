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
              <h6 class="m-0 font-weight-bold text-primary">Detail Data Presensi Kegiatan</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body table-responsive">
              <div class="row my-2">
                  <div class="col-2">Kelompok</div>
                  <div class="col-4">{{$presensi->kelompok->nama_kelompok}} 
                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Materi</b></div>
                          <div class="col-8">
                            {{$presensi->materi}}
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Tanggal</b></div>
                          <div class="col-8">
                            {{$presensi->tanggal}}
                          </div>
                      </div>
                  </div>
              </div>

              {{-- Table Presensi --}}
              <table class="table table-striped mt-4">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">MENTEE</th>
                      <th scope="col">PRODI</th>
                      <th scope="col">STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($mentee as $key=>$item)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$item->nama_lengkap}}</td>
                      <td>{{$item->prodi}}</td>
                      <td>{{$presensi->status[$key]->status}}
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <th scope="row">-</th>
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