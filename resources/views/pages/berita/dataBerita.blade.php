@extends('layout.master')

@section('heading')
Kelola Berita
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Informasi</h6>
                <a href="/kelola-berita/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i> TAMBAH
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                {{-- Table Berita --}}
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sumber</th>
                        <th style="white-space:nowrap; width:1%" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataBerita as $key=>$value)
                            <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$value->judul}}</td>
                            <td>{{$value->sumber}}</td>
                            <td style="white-space:nowrap; width:1%">
                                <a href="/kelola-berita/{{$value->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye" alt="view"></i> 
                                </a>
                                <a href="/kelola-berita/{{$value->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="fas fa-edit" alt="edit"></i> 
                                </a>
                                <form action="/kelola-berita/{{$value->id}}" method="POST" class="d-none d-sm-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                        <i class="fas fa-trash" alt="delete"></i> 
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