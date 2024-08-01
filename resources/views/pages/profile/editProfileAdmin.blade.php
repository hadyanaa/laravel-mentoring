@extends('layout.master')

@section('heading')
Profile Mentor
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
         </div>
         <!-- Card Body -->
         <form action="/profile/{{Auth::user()->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
               <div class="row">
                  {{-- Input Nama Admin --}}
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">NAMA*</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>  
                     </div>
                     @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>

                  {{-- Input Email --}}
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">EMAIL*</label>
                        <input type="text" name="email" class="form-control" value="{{$user->email}}" required>  
                        </div>
                        @error('jenis_kelamin')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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