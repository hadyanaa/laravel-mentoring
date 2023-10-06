@extends('layout.master')

@section('heading')
Informasi
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kelola Informasi</h6>
                <a href="/info/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="bi bi-plus text-white-50"></i> TAMBAH
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{-- Table Info --}}
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
                        @forelse ($dataInfo as $key=>$value)
                            <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$value->judul}}</td>
                            <td>{{$value->sumber}}</td>
                            <td style="white-space:nowrap; width:1%">
                                <a href="/info/{{$value->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-eye text-white"></i> 
                                </a>
                                <a href="/info/{{$value->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="bi bi-pencil-square text-white"></i> 
                                </a>
                                <form action="/info/{{$value->id}}" method="POST" class="d-none d-sm-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                        <i class="bi bi-trash text-white"></i> 
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