@extends('layout.master')

@section('heading')
Ganti Password
@endsection

@section('content')
<div class="row">

    <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Password</h6>
         </div>
         <!-- Card Body -->
         <form action="/profile/change-password/{{Auth::user()->id}}" method="POST" onsubmit="return validatePasswords()">
            @csrf
            @method('PUT')
            <div class="card-body">
               <div class="row">
                  <div class="col-3"></div>
                  <div class="col-6">
                     <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control"> 
                     </div>
                     <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control"> 
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control"> 
                        <div id="passwordError" style="color:red; display:none;">Passwords do not match!</div>
                     </div>
                     @if ($errors->any())
                        <div>
                           @foreach ($errors->all() as $error)
                                 <p>{{ $error }}</p>
                           @endforeach
                        </div>
                     @endif
                  </div>
                  <div class="col-3"></div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="javascript:window.history.back();" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   function validatePasswords() {
      var password = document.getElementById('new_password').value;
      var confirmPassword = document.getElementById('new_password_confirmation').value;
      var errorDiv = document.getElementById('passwordError');

      if (password !== confirmPassword) {
         errorDiv.style.display = 'block';
         return false; // Mencegah form submit jika password tidak cocok
      } else {
         errorDiv.style.display = 'none';
         return true; // Melanjutkan submit jika password cocok
      }
   }
</script>
@endsection