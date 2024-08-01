@extends('layout.master')

@section('heading')
Kelola Admin
@endsection

@section('content')
<div class="row">

   <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Admin</h6>
         </div>
         <!-- Card Body -->
         <form action="/admin" method="POST">
            @csrf
            <div class="card-body">
               <div class="row">
                  {{-- Input Nama Admin --}}
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">NAMA*</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  {{-- Input Email Admin --}}
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">EMAIL*</label>
                        <input type="email" class="form-control" name="email" required>  
                     </div>
                     @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>

               <div class="row">
                  {{-- Input Password Admin --}}
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">PASSWORD*</label>
                        <input type="password" class="form-control" name="password" required>  
                        @error('password')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="/profile" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</div>    
@endsection