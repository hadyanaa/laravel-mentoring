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
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/kelola-berita" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Input Judul --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">Judul*</label>
                              <input type="text" name="judul" class="form-control" required>  
                            </div>
                        </div>

                        {{-- Input Sumber --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">Sumber*</label>
                              <input type="text" name="sumber" class="form-control" required>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Informasi --}}
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Detail Konten*</label>
                              <textarea type="text" name="konten_berita" class="form-control" rows="10" required></textarea>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Gambar --}}
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Upload Gambar</label>
                              <input class="form-control" type="file" id="formFile" disabled> 
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