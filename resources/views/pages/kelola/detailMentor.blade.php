@extends('layout.master')

@section('heading')
Kelola
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Mentor</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Nama Mentor</th>
                        <td>:   Hadyan Abdul Aziz</td>                   
                      </tr>
                      <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>:   Laki-laki</td>
                      </tr>
                      <tr>
                        <th scope="row">Asal Institusi</th>
                        <td>: Sekolah Tinggi Teknologi Terpadu Nurul Fikri</td>
                      </tr>
                      <tr>
                        <th scope="row">Prodi</th>
                        <td>: Sistem Informasi</td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td>: hadyanabdulaziz@gmail.com</td>
                      </tr>
                      <tr>
                        <th scope="row">Password</th>
                        <td>: *********</td>
                      </tr>
                      <tr>
                        <th scope="row">Aktivitas</th>
                        <td>: Mahasiswa</td>
                      </tr>
                      <tr>
                        <th scope="row">Domisili</th>
                        <td>: Depok</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection