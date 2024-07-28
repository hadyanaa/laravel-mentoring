@extends('layout.master')

@section('heading')
Informasi
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-xxl-12 text-center">
                        <h1 class="coming-soon">
                            <img class="img-fluid" src="{{asset('template/img/undraw_posting_photo.svg')}}" alt="">
                        </h1>
                    </div>
                    <div class="col-xl-8 col-xxl-12">
                        <div class="mb-4 mb-xl-0 mb-xxl-4">
                            <h1 class="text-primary">Info Materi Mentoring</h1>
                            <p class="text-gray-700 mb-4">
                            Untuk materi mentoring bisa dilihat di link google drive berikut. Materi ini bersifat referensi dan tidak mengikat, jika ingin menyampaikan dengan bahasa sendiri dipersilakan.
                            <br><br>
                            Disclaimer: Hanya untuk kalangan Mentor. Dilarang menyebarluaskan materi tanpa seizin pihak BKPK.
                            </p>
                            @auth
                                <a target="_blank" href="https://drive.google.com/drive/folders/1GUGxQqsvkKoqutXSqb79kcQtJOIzTTj3?usp=sharing" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    Link Materi
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    Login
                                </a>
                            @endauth
                        </div>    
                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>

        @forelse ($dataBerita as $key=>$value)
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="mb-4 mb-xl-0 mb-xxl-4">
                            <h3 class="text-primary">{{$value->judul}}</h3>
                            <span class="small">Source from {{$value->sumber}}</span> | 
                            <span class="small">created at {{$value->created_at}}</span>
                            <p class="text-gray-700 mt-2 mb-2">
                                {{$value->konten_berita}}
                            </p>
                        </div>    
                    </div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
        @empty
        <div class="card-body">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <h1 class="coming-soon">
                        <i class="far fa-frown-open"></i>
                    </h1>
                    <h3 class="coming-soon">Tidak Ada Berita</h3>
                </div>
                <div class="col"></div>
            </div>
        </div>
        @endforelse
    </div>
</div>    
@endsection
