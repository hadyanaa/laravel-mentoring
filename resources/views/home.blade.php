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
                <h6 class="m-0 font-weight-bold text-primary">Berita</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <h1 class="coming-soon">
                            <i class="bi bi-cone fa-2x"></i>
                        </h1>
                        <h3 class="coming-soon">Berita 1</h3>
                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
</div>    
@endsection
