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
                <h6 class="m-0 font-weight-bold text-primary">Data Kelompok</h6>
                <a href="/kelompok/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                {{-- Table Kelompok --}}
                <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA MENTOR</th>
                        <th scope="col">NAMA KELOMPOK</th>
                        <th scope="col">JUMLAH PERTEMUAN</th>
                        <th scope="col">JUMLAH ANGGOTA</th>
                        <th scope="col">AKSI</th>
                        <th scope="col">STATISTIK</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelompok as $key=>$item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            @if (isset($item->mentor->nama_mentor))
                            <td>{{$item->mentor->nama_mentor}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{$item->nama_kelompok}}</td>
                            <td>{{count($item->presensi)}}</td>
                            <td>{{count($item->mentee)}}</td>
                            <td>
                                <a href="/kelompok/{{$item->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye"></i> 
                                </a>
                                <a href="/kelompok/{{$item->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form action="/kelompok/{{$item->id}}" method="POST" class="d-none d-sm-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                                        <i class="fas fa-trash"></i> 
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="/presensi-kelompok/{{$item->id}}/lihat-statistik" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm ml-2">
                                    <i class="fas fa-chart-bar"></i> Lihat Statistik
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