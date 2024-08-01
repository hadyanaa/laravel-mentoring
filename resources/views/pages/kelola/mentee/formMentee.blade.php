@extends('layout.master')

@section('heading')
Kelola
@endsection

@section('content')
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
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
         <form action="/mentee" method="POST">
            @csrf
            <div class="card-body">
               <div class="row">
                  {{-- Input Nama Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">NAMA MENTEE*</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>  
                        </div>
                  </div>

                  {{-- Input Jenis Kelamin Mentee --}}
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
                  {{-- Input Tempat Lahir Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">TEMPAT LAHIR (KOTA)</label>
                        <input type="text" name="tempat_lahir" class="form-control">  
                        </div>
                  </div>

                  {{-- Input Tanggal Lahir Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                           <label class="form-label">TANGGAL LAHIR</label>
                           <div class="input-group date">
                              <input data-provide="datepicker" type="text" class="form-control" name="tgl_lahir">
                              <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                       <i class="bi bi-calendar-date"></i>
                                    </span>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>

               <div class="row">
                  {{-- Input Nomor HP Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">NOMOR HP*</label>
                        <input type="text" class="form-control" name="no_hp" required>  
                        </div>
                  </div>

                  {{-- Input Prodi Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">PRODI*</label>
                        <select class="form-control form-select" name="prodi" required>
                           <option value="">-- Pilih Prodi --</option>
                           <option value="Sistem Informasi">Sistem Informasi</option>
                           <option value="Teknik Informatika">Teknik Informatika</option>
                           <option value="Bisnis Digital">Bisnis Digital</option>
                        </select>
                        </div>
                  </div>
               </div>

               <div class="row">
                  {{-- Input Angkatan Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                           <label class="form-label">ANGKATAN*</label>
                           <input type="text" class="form-control" name="angkatan" required>  
                        </div>
                  </div>
                  
                  {{-- Input Akun IG Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                           <label class="form-label">AKUN INSTAGRAM</label>
                           <input type="text" class="form-control" name="akun_ig">  
                        </div>
                  </div>
               </div>

               <div class="row">
                  {{-- Input Asal Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                           <label class="form-label">ALAMAT ASAL</label>
                           <input type="text" class="form-control" name="alamat_asal">  
                        </div>
                  </div>

                  {{-- Input Domisili Mentee --}}
                  <div class="col-6">
                        <div class="mb-3">
                           <label class="form-label">ALAMAT DOMISILI</label>
                           <input type="text" class="form-control" name="alamat_domisili"> 
                        </div>
                  </div>
               </div>

               <div class="row">
                  {{-- Input Kelompok Mentoring --}}
                  <div class="col-12">
                        <div class="mb-3">
                           <label class="form-label">KELOMPOK MENTORING*</label>
                           <select class="form-control form-select" name="kelompok_id">
                              <option value="">-- Pilih Kelompok --</option>
                              @forelse ($kelompok as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kelompok}}</option>        
                              @empty
                              <option value="">Tidak ada data Kelompok</option>
                              @endforelse
                           </select>
                        </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="/mentee" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</div>    
@endsection