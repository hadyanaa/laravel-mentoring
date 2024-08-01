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
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Presensi Kegiatan</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body table-responsive">
            <form action="/presensi/{{$presensi->id}}" method="POST">
            @csrf
            @method('PUT')
              {{-- Pilih Kelompok --}}
              <div class="row my-2">
                  <div class="col-2">Kelompok</div>
                  <div class="col-4">{{$kelompok->nama_kelompok}}
                    <input type="text" name="kelompok_id" value="{{$kelompok->id}}" class="form-control" hidden> 
                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Materi</b></div>
                          <div class="col-8">
                            <input type="text" name="materi" class="form-control" value="{{$presensi->materi}}"> 
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="row">
                          <div class="col-4"><b>Tanggal</b></div>
                          <div class="col-8">
                            <div class="input-group date">
                              <input data-provide="datepicker" type="text" class="form-control" name="tanggal" value="{{$presensi->tanggal}}">
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
                    @forelse ($mentee as $key=>$item)
                    <tr>
                      <td>{{$key + 1}} 
                        <input type="text" name="mentee_id[]" value="{{$item->id}}" class="form-control" hidden>
                      </td>
                      <td>{{$item->nama_lengkap}}</td>
                      <td>{{$item->prodi}}</td>
                      <td>       
                        <select class="form-control form-select col-6" name="status[]">
                          <option value="Hadir" {{$status[$key]->status === "Hadir" ? "selected": ""}}>Hadir</option>
                          <option value="Izin" {{$status[$key]->status === "Izin" ? "selected": ""}}>Izin</option>
                          <option value="Sakit" {{$status[$key]->status === "Sakit" ? "selected": ""}}>Sakit</option>
                          <option value="Alpa" {{$status[$key]->status === "Alpa" ? "selected": ""}}>Alpa</option>
                        </select>
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
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-right">
                  <button type="submit" class="btn btn-primary mr-3">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>    
@endsection