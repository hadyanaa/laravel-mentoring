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
              <h6 class="m-0 font-weight-bold text-primary">Isi Data Presensi Kegiatan</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form action="/presensi" method="POST">
            @csrf
              
              {{-- Pilih Kelompok --}}
              <div class="row my-2">
                  <div class="col-2">Kelompok</div>
                  <div class="col-4">
                    <select class="form-control form-select" name="kelompok_id">
                      <option value="">-- Pilih Kelompok --</option>
                      @forelse ($kelompok as $item)
                      <option value="{{$item->id}}">{{$item->nama_kelompok}}</option>
                      @empty
                      <option value="">Tidak ada kelompok</option>
                      @endforelse
                    </select>
                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Materi</b></div>
                          <div class="col-8">
                            <input type="text" name="materi" class="form-control"> 
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Tanggal</b></div>
                          <div class="col-8">
                            <div class="input-group date">
                              <input data-provide="datepicker" type="text" class="form-control" name="tanggal">
                              <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">
                                      <i class="bi bi-calendar-date"></i>
                                  </span>
                              </div>
                            </div>
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
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>TI</td>
                      <td>HADIR</td>
                    </tr>
                  </tbody>
              </table>
            </form>
          </div>
        </div>
    </div>
</div>    
@endsection