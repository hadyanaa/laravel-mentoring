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
                <h6 class="m-0 font-weight-bold text-primary">Data Mentor</h6>
                <a href="/mentor/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                {{-- Table Mentor --}}
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($mentor as $key=>$item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama_mentor}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->prodi}}</td>
                            <td class="">
                                <a href="/mentor/{{$item->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye"></i> 
                                </a>
                                <a href="/mentor/{{$item->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form action="/mentor/{{$item->id}}" method="POST" class="d-none d-sm-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                        <i class="fas fa-trash"></i> 
                                    </button>
                                </form>
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