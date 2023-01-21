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
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Mentor</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/mentor/{{$mentor->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- Input Nama Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NAMA MENTOR</label>
                              <input type="text" name="nama_mentor" class="form-control" value="{{$mentor->nama_mentor}}">  
                            </div>
                            @error('nama_mentor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Jenis Kelamin Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">JENIS KELAMIN</label>
                              <select class="form-control form-select" name="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Ikhwan" {{$mentor->jenis_kelamin === "Ikhwan" ? "selected": ""}}>Ikhwan</option>
                                <option value="Akhwat" {{$mentor->jenis_kelamin === "Akhwat" ? "selected": ""}}>Akhwat</option>
                              </select>
                            </div>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Institusi Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">ASAL INSTITUSI</label>
                              <input type="text" class="form-control" name="asal_institusi" value="{{$mentor->asal_institusi}}">  
                            </div>
                            @error('asal_institusi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Prodi Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">PRODI</label>
                              <select class="form-control form-select" name="prodi">
                                <option value="">-- Pilih Prodi --</option>
                                <option value="Sistem Informasi" {{$mentor->prodi === "Sistem Informasi" ? "selected": ""}}>Sistem Informasi</option>
                                <option value="Teknik Informatika" {{$mentor->prodi === "Teknik Informatika" ? "selected": ""}}>Teknik Informatika</option>
                                <option value="Bisnis Digital" {{$mentor->prodi === "Bisnis Digital" ? "selected": ""}}>Bisnis Digital</option>
                              </select>
                            </div>
                            @error('prodi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Email Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">EMAIL</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">  
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Aktivitas Mentor --}}
                        {{-- Disabled untuk sementara --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">AKTIVITAS</label>
                                <input type="text" class="form-control" readonly> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Password Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">PASSWORD</label>
                                <input type="password" class="form-control" name="password" value="{{$user->password}}">  
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Domisili Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">DOMISILI</label>
                                <input type="text" class="form-control" name="domisili" value="{{$mentor->domisili}}"> 
                            </div>
                            @error('domisili')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection