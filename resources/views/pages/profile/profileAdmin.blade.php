@extends('layout.master')

@section('heading')
Profile Admin
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
                     <th scope="col"></th>
                     <th scope="col"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                     <th scope="row">Email</th>
                     <td>: {{$user->email}}</td>
                     <th scope="row">Jumlah Admin</th>
                     <td>: 1</td>
                     </tr>
                     <tr>
                     <th scope="row">Password</th>
                     <td>
                        <button type="button" class="btn btn-primary btn-sm">
                           Ganti Password
                        </button>
                     </td>
                     </tr>
                  </tbody>
               </table>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
               <a href="/mentor/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                  <i class="fas fa-plus"></i> Tambah
               </a>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
               <table class="table table-striped mt-4">
                  <thead>
                     <tr>
                     <th scope="col">#</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Email</th>
                     <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>
                           <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                              <i class="fas fa-eye"></i> 
                           </a>
                           <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                              <i class="fas fa-edit"></i> 
                           </a>
                           <form action="/" method="POST" class="d-none d-sm-inline-block">
                              <!-- @csrf
                              @method('delete') -->
                              <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                 <i class="fas fa-trash"></i> 
                              </button>
                           </form>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
        </div>
    </div>
</div>    
@endsection