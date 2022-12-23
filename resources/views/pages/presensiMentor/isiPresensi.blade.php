@extends('layout.masterMentor')

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
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi Kegiatan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-2">Kelompok</div>
                    <div class="col-10">Umar Bin Khattab</div>
                </div>

                <div class="row my-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4"><b>Materi</b></div>
                            <div class="col-8">Makna Ukhuwah Islamiyah</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4"><b>Tanggal</b></div>
                            <div class="col-8">02 Agustus 2022</div>
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
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>TI</td>
                        <td>HADIR</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>TI</td>
                        <td>HADIR</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>    
@endsection