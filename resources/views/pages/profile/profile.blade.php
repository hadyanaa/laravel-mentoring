@extends('layout.master')

@section('heading')
Profile Mentor
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            <a href="/profile/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
               <i class="bi bi-pencil-square text-white-50"></i> EDIT
            </a>
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
                     <th scope="row">Nama Mentor</th>
                     <td>:   {{$mentor->nama_mentor}}</td>                   
                  </tr>
                  <tr>
                     <th scope="row">Jenis Kelamin</th>
                     <td>:   {{$mentor->jenis_kelamin}}</td>
                  </tr>
                  <tr>
                     <th scope="row">Asal Institusi</th>
                     <td>: {{$mentor->asal_institusi}}</td>
                  </tr>
                  <tr>
                     <th scope="row">Prodi</th>
                     <td>: {{$mentor->prodi}}</td>
                  </tr>
                  <tr>
                     <th scope="row">Domisili</th>
                     <td>: {{$mentor->domisili}}</td>
                  </tr>
                  <tr>
                     <th scope="row">No Telpon</th>
                     <td>: {{$mentor->no_telpon}}</td>
                  </tr>
                  <tr>
                     <th scope="row">Email</th>
                     <td>: {{$user->email}}</td>
                  </tr>
                  <tr>
                     <th scope="row">Password</th>
                     <td>
                        <a href="/profile/change-password" class="btn btn-primary btn-sm">
                           Ganti Password
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