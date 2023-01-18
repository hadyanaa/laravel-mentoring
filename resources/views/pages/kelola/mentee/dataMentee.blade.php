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
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mentee</h6>
                <a href="/mentee/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="bi bi-plus text-white-50"></i> TAMBAH
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{-- Table Mentee --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA MENTEE</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">NAMA MENTOR</th>
                        <th scope="col">NAMA KELOMPOK</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataMentee as $key=>$value)
                            <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$value->nama_lengkap}}</td>
                            <td>{{$value->jenis_kelamin}}</td>
                            <td>{{$value->nama_mentor}}</td>
                            <td>{{$value->nama_kelompok}}</td>
                            <td>
                                <a href="/data-mentee/detail" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-eye text-white"></i> 
                                </a>
                                <a href="/presensi-kelompok" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="bi bi-pencil-square text-white"></i> 
                                </a>
                                <a href="/presensi-kelompok" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="bi bi-trash text-white"></i> 
                                </a>
                            </td>                    
                            </tr>                       
                        @empty
                            <tr colspan="4">
                                <td>No data</td>
                            </tr> 
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>    
@endsection