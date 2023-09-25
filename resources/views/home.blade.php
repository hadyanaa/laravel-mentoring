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
                <div class="row align-items-center">
                    <div class="col-xl-4 col-xxl-12 text-center">
                    <h1 class="coming-soon">
                            <!-- <i class="bi bi-cone fa-2x"></i> -->
                            <img class="img-fluid" src="{{asset('template/img/undraw_posting_photo.svg')}}" alt="">
                        </h1>
                    </div>
                    <div class="col-xl-8 col-xxl-12">
                        <div class="mb-4 mb-xl-0 mb-xxl-4">
                            <h1 class="text-primary">Info Materi Mentoring</h3>
                            <p class="text-gray-700 mb-4">
                            Untuk materi mentoring bisa dilihat di link google drive berikut. Materi ini bersifat referensi dan tidak mengikat, jika ingin menyampaikan dengan bahasa sendiri dipersilakan.
                            <br><br>
                            Disclaimer: Hanya untuk kalangan Mentor. Dilarang menyebarluaskan materi tanpa seizin pihak BKPK.
                            </p>
                            <a href="https://drive.google.com/drive/folders/1GUGxQqsvkKoqutXSqb79kcQtJOIzTTj3?usp=sharing" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                Link Materi
                            </a>
                        </div>    
                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
</div>    
@endsection
