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
                <h6 class="m-0 font-weight-bold text-primary">Edit Kelompok</h6>
            </div>
            <!-- Card Body -->
            <form action="/kelompok/{{$kelompok->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        {{-- Input Nama Kelompok --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NAMA KELOMPOK*</label>
                              <input type="text" name="nama_kelompok" class="form-control" value="{{$kelompok->nama_kelompok}}" required>  
                            </div>
                        </div>

                        {{-- Input Mentor --}}
                        <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label">NAMA MENTOR*</label>
                              <select class="form-control form-select" name="mentor_id" required>
                                <option value="">-- Pilih Mentor --</option>
                                @forelse ($mentor as $item)
                                    @if ($item->id === $kelompok->mentor_id)
                                        <option value="{{$item->id}}" selected>{{$item->nama_mentor}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->nama_mentor}}</option>
                                    @endif
                                @empty
                                    <option value="">Tidak ada data Mentor</option>
                                @endforelse
                              </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/kelompok" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>    
@endsection