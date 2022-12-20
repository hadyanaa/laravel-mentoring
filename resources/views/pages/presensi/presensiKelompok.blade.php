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
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi Kelompok</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-2">Nama Mentor</div>
                    <div class="col-3">Fathi</div>
                </div>
                <div class="row my-2">
                    <div class="col-2">Kelompok</div>
                    <div class="col-3">Umar Bin Khattab</div>
                </div>

                {{-- Table Presensi --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">TANGGAL</th>
                        <th scope="col">MATERI</th>
                        <th scope="col">PERSENTASE KEHADIRAN</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>90%</td>
                        <td>
                            <a href="/presensi-kegiatan">
                                <button type="button" class="btn btn-primary btn-sm">LIHAT</button>
                            </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>90%</td>
                        <td>
                            <a href="/presensi-kegiatan">
                                <button type="button" class="btn btn-primary btn-sm">LIHAT</button>
                            </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>90%</td>
                        <td>
                            <a href="/presensi-kegiatan">
                                <button type="button" class="btn btn-primary btn-sm">LIHAT</button>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>    
@endsection