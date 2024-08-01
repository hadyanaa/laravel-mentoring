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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mentor</h6>
            </div>
            <!-- Card Body -->
            <form action="/mentor" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        {{-- Input Nama Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NAMA MENTOR*</label>
                              <input type="text" name="nama_mentor" class="form-control" required>  
                            </div>
                        </div>

                        {{-- Input Jenis Kelamin Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">JENIS KELAMIN*</label>
                              <select class="form-control form-select" name="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">                        
                        {{-- Input Institusi Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">ASAL INSTITUSI</label>
                              <select class="form-control form-select" name="asal_institusi">
                                <option value="">-- Pilih Institusi --</option>
                                <option value="STTNF">STTNF</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                            </div>
                        </div>

                        {{-- Input Prodi Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">PRODI</label>
                              <select class="form-control form-select" name="prodi">
                                <option value="">-- Pilih Prodi --</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Domisili Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">DOMISILI</label>
                                <input type="text" class="form-control" name="domisili"> 
                            </div>
                        </div>

                        {{-- Input No Telpon Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">NO TELPON*</label>
                                <input type="text" class="form-control" name="no_telpon" required> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Email Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">EMAIL*</label>
                                <input type="email" class="form-control" name="email" required>  
                            </div>
                        </div>

                        {{-- Input Password Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">PASSWORD*</label>
                                <input type="password" class="form-control" name="password" required>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/mentor" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>    
@endsection