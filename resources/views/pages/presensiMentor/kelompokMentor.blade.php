@extends('layout.master')

@section('heading')
Presensi
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    @foreach ($kelompok as $item)
    <div class="col-4">
        <div class="card shadow mb-4">
          <!-- Card Header -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            {{strtoupper($item->nama_kelompok)}}
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <h5>{{count($item->presensi)}}x Pertemuan</h5>
            <h5>{{count($item->mentee)}} Anggota</h5>
            <a href="/presensi-kelompok/{{$item->id}}/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-4">
                Isi Presensi
            </a>
            <a href="/presensi-kelompok/{{$item->id}}/lihat" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mt-4">
              Lihat Presensi
            </a>
            <a href="/presensi-kelompok/{{$item->id}}/lihat-statistik" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4">
              <i class="bi bi-bar-chart"></i> Lihat Statistik
            </a>
          </div>
        </div>
    </div>
    @endforeach
    @if (count($kelompok) == 0)
    <div class="card-body">
      <h5>Belum ada kelompok</h5>
    </div>
    @endif
</div>    
@endsection