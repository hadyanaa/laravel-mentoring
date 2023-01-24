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
            <h5>{{(count($item->presensi)/14)*100}}x Kehadiran</h5>
            <h5>{{count($item->mentee)}} Anggota</h5>
            <a href="/presensi-kelompok/{{$item->id}}/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-4">
                Isi Presensi
            </a>
          </div>
        </div>
    </div>
    @endforeach
</div>    
@endsection