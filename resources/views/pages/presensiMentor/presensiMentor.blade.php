@extends('layout.master')

@section('heading')
Presensi
@endsection

@section('content')
<div class="row">

   <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Presensi {{ucfirst($kelompok->nama_kelompok)}}</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body table-responsive">
            {{-- Table Presensi --}}
            <table class="table table-striped mt-4">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">MATERI</th>
                     <th scope="col">TANGGAL</th>
                     <th scope="col">KELOMPOK</th>
                     <th scope="col">KEHADIRAN</th>
                     <th scope="col">AKSI</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($presensi as $key=>$item)
                  <tr>
                     <th scope="row">{{$key + 1}}</th>
                     <td>{{$item->materi}}</td>
                     <td>{{$item->tanggal}}</td>
                     <td>{{$item->kelompok->nama_kelompok}}</td>
                     <td>{{count($item->status)}}</td>
                     <td>
                        <a href="/presensi/{{$item->id}}"  class="d-none d-sm-inline-block btn btn-sm btn-primary">
                           <i class="bi bi-eye text-white"></i> 
                        </a>
                        <a href="/presensi-kelompok/{{$item->id}}/edit"  class="d-none d-sm-inline-block btn btn-sm btn-success">
                           <i class="bi bi-pencil-square text-white"></i> 
                        </a>
                     </td>            
                  </tr>
                  @empty
                  <tr>
                     <th scope="row">-</th>
                     <td>Tidak ada data</td>
                     <td>Tidak ada data</td>
                     <td>Tidak ada data</td>
                     <td>
                        Tidak ada aksi
                     </td>                    
                  </tr>        
                  @endforelse
               </tbody>
            </table>
         </div>
         <div class="card-footer">
            <a href="javascript:window.history.back();" class="btn btn-secondary">Back</a>
         </div>
      </div>
   </div>
</div>    
@endsection