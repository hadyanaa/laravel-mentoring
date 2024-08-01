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
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Mentee</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body table-responsive">
            <table class="table table-striped mt-4">
               <thead>
                  <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                  <th scope="row">Nama Mentee</th>
                  <td>:   {{$mentee->nama_lengkap}}</td>                   
                  </tr>
                  <tr>
                  <th scope="row">Jenis Kelamin</th>
                  <td>:   {{$mentee->jenis_kelamin}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Tempat Lahir</th>
                  <td>: {{$mentee->tempat_lahir}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Tanggal Lahir</th>
                  <td>: {{$mentee->tgl_lahir}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Alamat Asal</th>
                  <td>: {{$mentee->alamat_asal}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Domisili</th>
                  <td>: {{$mentee->alamat_domisili}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Prodi</th>
                  <td>: {{$mentee->prodi}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Nomor HP</th>
                  <td>: {{$mentee->no_hp}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Akun Instagram</th>
                  <td>: {{$mentee->akun_ig}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Nama Kelompok</th>
                  <td>: {{$kelompok->nama_kelompok}}</td>
                  </tr>
                  <tr>
                  <th scope="row">Nama Mentor</th>
                  <td>: {{$mentor->nama_mentor}}</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="card-footer">
            <a href="/mentee" class="btn btn-secondary">Back</a>
         </div>
      </div>
   </div>
</div>    
@endsection