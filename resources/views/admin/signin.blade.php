@extends('admin.layouts.auth-app')
@section('content')
<div class="row">
    <div class="col-6 mb-2 mb-sm-0">
      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
        <img src="{{ asset('admin/dist/images/svgs/google-icon.svg') }}" alt="" class="img-fluid me-2" width="18" height="18">
        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
      </a>
    </div>
    <div class="col-6">
      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
        <img src="{{ asset('admin/dist/images/svgs/facebook-icon.svg') }}" alt="" class="img-fluid me-2" width="18" height="18">
        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
      </a>
    </div>
  </div>
  <div class="position-relative text-center my-4">
    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
  </div>
  <form action="{{ route('login') }}" method="post">
        @csrf
            @error('terms')
                <small class="text-danger">{{ $message }}</small>
            @enderror

    <div class="mb-3">
      <label for="email" class="form-label">Username</label>
      <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
        @error('email')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-4">


      <label for="password" class="form-label">Password</label>

      <div class="input-group" id="show_hide_password">
        <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password">
        <span class="input-group-text"><a href="javascript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
        @error('email')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      
    </div>
    <div class="d-flex align-items-center justify-content-between mb-4">
      <div class="form-check">
        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label text-dark" for="flexCheckChecked">
          Remeber this Device
        </label>
      </div>
      <a class="text-primary fw-medium" href="./authentication-forgot-password.html">Forgot Password ?</a>
    </div>
    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
    <div class="d-flex align-items-center justify-content-center">
      <p class="fs-4 mb-0 fw-medium">New to Developer:NAY?</p>
      <a class="text-primary fw-medium ms-2" href="{{ route('admin#signup') }}">Create an account</a>
    </div>
  </form>

    
@endsection
@section('script')
<script>
$(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });

      

    });
</script>
@endsection