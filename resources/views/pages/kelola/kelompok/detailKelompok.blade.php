@extends('layout.master')

@section('heading')
Presensi
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Kelompok</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                <div class="row my-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4"><b>Nama Mentor</b></div>
                            @if (isset($kelompok->mentor->nama_mentor))
                            <div class="col-8">{{$kelompok->mentor->nama_mentor}}</div>
                            @else 
                            <div class="col-8">Tidak ada mentor</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4"><b>Nama Kelompok</b></div>
                            <div class="col-8">{{$kelompok->nama_kelompok}}</div>
                        </div>
                    </div>
                </div>

                {{-- Table Presensi --}}
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">MENTEE</th>
                            <th scope="col">PRODI</th>
                            <th scope="col">NO HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelompok->mentee as $key=>$item)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->prodi}}</td>
                            <td>{{$item->no_hp}}</td>
                        </tr>                        
                        @empty
                        <tr>
                            <th scope="row">-</th>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                            <td>Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
                <a href="/kelompok" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>    
@endsection