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
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Informasi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/info/{{$info->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- Input Judul --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{$info->judul}}" required>
                            </div>
                        </div>

                        {{-- Input Sumber --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">Sumber</label>
                              <input type="text" name="sumber" class="form-control" value="{{$info->sumber}}" required>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Informasi --}}
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Detail Konten</label>
                              <input type="text" name="konten_info" class="form-control" value="{{$info->konten_info}}" required>  
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection