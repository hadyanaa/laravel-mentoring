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
                    <i class="bi bi-plus text-white-50"></i> TAMBAH
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{-- Table Mentor --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">MENTOR</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">PRODI</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($mentor as $key=>$item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama_mentor}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->prodi}}</td>
                            <td>
                                <a href="/mentor/{{$item->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-eye text-white"></i> 
                                </a>
                                <a href="/mentor/{{$item->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="bi bi-pencil-square text-white"></i> 
                                </a>
                                <form action="/mentor/{{$item->id}}" method="POST" class="d-none d-sm-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                        <i class="bi bi-trash text-white"></i> 
                                    </button>
                                    {{-- <button type="button" data-toggle="modal" data-target="#deleteDataMentor" class="btn btn-sm btn-danger shadow-sm">
                                        <i class="bi bi-trash text-white"></i> 
                                    </button> --}}
                                    
                                    <!-- Modal -->
                                    {{-- <div class="modal fade" id="deleteDataMentor" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mentor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Yakin ingin menghapus data mentor?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div> --}}
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