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
                <h6 class="m-0 font-weight-bold text-primary">Detail Berita</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Judul</th>
                        <td>:   {{$berita->judul}}</td>                   
                      </tr>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Sumber</th>
                        <td>:   {{$berita->sumber}}</td>
                      </tr>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Created Date</th>
                        <td>:   {{$berita->created_at}}</td>
                      </tr>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Last Update</th>
                        <td>:   {{$berita->updated_at}}</td>
                      </tr>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Detail Konten</th>
                        <td>:   {{$berita->konten_berita}}</td>
                      </tr>
                      <tr>
                        <th style="white-space:nowrap; width:1%" scope="row">Gambar</th>
                        <td>:   -</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection