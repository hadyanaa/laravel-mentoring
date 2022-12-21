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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mentee</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">NAMA MENTEE</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">JENIS KELAMIN</label>
                              <select class="form-control form-select">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">ASAL INSTITUSI</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">PRODI</label>
                              <select class="form-control form-select">
                                <option value="SI">Sistem Informasi</option>
                                <option value="TI">Teknik Informatika</option>
                                <option value="BD">Bisnis Digital</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">DOMISILI</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">AKTIVITAS</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MENTOR</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">KELOMPOK</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
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