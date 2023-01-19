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
                <h6 class="m-0 font-weight-bold text-primary">Edit Mentee</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="/mentee/{{$mentee->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- Input Nama Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NAMA MENTEE</label>
                              <input type="text" name="nama_lengkap" class="form-control" value="{{$mentee->nama_lengkap}}">  
                            </div>
                            @error('nama_lengkap')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Jenis Kelamin Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">JENIS KELAMIN</label>
                              <select class="form-control form-select" name="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Ikhwan" {{$mentee->jenis_kelamin === "Ikhwan" ? "selected": ""}}>Ikhwan</option>
                                <option value="Akhwat" {{$mentee->jenis_kelamin === "Akhwat" ? "selected": ""}}>Akhwat</option>
                              </select>
                            </div>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Tempat Lahir Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">TEMPAT LAHIR (KOTA)</label>
                              <input type="text" name="tempat_lahir" class="form-control" value="{{$mentee->tempat_lahir}}">  
                            </div>
                            @error('tempat_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Tanggal Lahir Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">TANGGAL LAHIR</label>
                                <div class="input-group date">
                                    <input data-provide="datepicker" type="text" class="form-control" name="tgl_lahir" value="{{$mentee->tgl_lahir}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="bi bi-calendar-date"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @error('tgl_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Nomor HP Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NOMOR HP</label>
                              <input type="text" class="form-control" name="no_hp" value="{{$mentee->no_hp}}">  
                            </div>
                            @error('no_hp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Prodi Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">PRODI</label>
                              <select class="form-control form-select" name="prodi">
                                <option value="">-- Pilih Prodi --</option>
                                <option value="Sistem Informasi" {{$mentee->prodi === "Sistem Informasi" ? "selected": ""}}>Sistem Informasi</option>
                                <option value="Teknik Informatika" {{$mentee->prodi === "Teknik Informatika" ? "selected": ""}}>Teknik Informatika</option>
                                <option value="Bisnis Digital" {{$mentee->prodi === "Bisnis Digital" ? "selected": ""}}>Bisnis Digital</option>
                              </select>
                            </div>
                            @error('prodi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Asal Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">ALAMAT ASAL</label>
                                <input type="text" class="form-control" name="alamat_asal" value="{{$mentee->alamat_asal}}">  
                            </div>
                            @error('alamat_asal')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Domisili Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">ALAMAT DOMISILI</label>
                                <input type="text" class="form-control" name="alamat_domisili" value="{{$mentee->alamat_domisili}}"> 
                            </div>
                            @error('alamat_domisili')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Input Akun IG Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">AKUN INSTAGRAM</label>
                                <input type="text" class="form-control" name="akun_ig" value="{{$mentee->akun_ig}}">  
                            </div>
                            @error('akun_ig')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Domisili Mentee --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">KELOMPOK MENTORING</label>
                                <select class="form-control form-select" name="kelompok_id">
                                    <option value="">-- Pilih Kelompok --</option>
                                    @forelse ($kelompok as $item)
                                    @if ($item->id === $mentee->kelompok_id)
                                        <option value="{{$item->id}}" selected>{{$item->nama_kelompok}}</option> 
                                    @else
                                        <option value="{{$item->id}}">{{$item->nama_kelompok}}</option>       
                                    @endif
                                    @empty
                                    <option value="">Tidak ada data Kelompok</option>
                                    @endforelse
                                </select>
                            </div>
                            @error('kelompok_id')
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